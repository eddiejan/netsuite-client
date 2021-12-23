<?php

namespace Eddiejan\NetsuiteClient;

use Eddiejan\Package\ClientInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\ResponseStreamInterface;

final class NetsuiteClient implements ClientInterface
{
    private ?NetsuiteCredential $credential;

    public function __construct(
        private HttpClientInterface $client
    ) { }

    public function connectCredential(NetsuiteCredential $credential): void
    {
        $this->credential = $credential;
        $this->client->withOptions(['base_uri' => $this->credential->getBaseUri()]);
    }

    public function disconnectCredential(): void
    {
        $this->credential = null;
    }

    public function request(string $method, string $url, array $options = []): ResponseInterface
    {
        return $this->client->request($method, $url, $this->options($method, $url, $options));
    }

    public function stream(iterable|ResponseInterface $responses, float $timeout = null): ResponseStreamInterface
    {
        return $this->client->stream($responses, $timeout);
    }

    public function withOptions(array $options): static
    {
        $clone = clone $this;
        $clone->client = $this->client->withOptions($options);

        return $clone;
    }

    private function options(string $method, string $url, array $options = []): array
    {
        $params = [
            'oauth_consumer_key' => $this->credential->getConsumerKey(),
            'oauth_token' => $this->credential->getToken(),
            'oauth_signature_method' => 'HMAC-SHA256',
            'oauth_timestamp' => date('U'),
            'oauth_nonce' => $this->nonce(),
            'oauth_version' => '1.0'
        ];

        if(isset($options['query'])) {
            $queryParams = array_merge($options['query'], $params);
        }
        else {
            $queryParams = $params;
        }
        ksort($queryParams);
        $baseString = $this->baseString($method, $this->credential->getBaseUri() . $url , $queryParams);

        $params['oauth_signature'] = $this->sign($baseString, $this->credential->getConsumerSecret() . '&' . $this->credential->getTokenSecret());

        foreach($params as $key => $value) {
            $params[$key] = $key . '="' . rawurlencode($value) . '"';
        }

        array_unshift(
            $params,
            'realm="' . rawurlencode($this->credential->getRealm()) . '"'
        );

        $options['headers'] = ['Authorization' => 'OAuth ' . implode(', ', $params)];;

        return $options;
    }


    private function baseString(string $method, string $requestUri, array $queryParams): string
    {
        $params = http_build_query($queryParams, null, '&', PHP_QUERY_RFC3986);
        return sprintf('%s&%s&%s', $method, rawurlencode($requestUri), rawurlencode($params));
    }

    private function sign(string $baseString, string $key): string
    {
        return base64_encode(hash_hmac('sha256', $baseString, $key, true));
    }

    private function nonce():string
    {
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return time();
    }
}