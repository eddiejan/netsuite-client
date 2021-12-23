<?php

namespace Eddiejan\NetsuiteClient;

class NetsuiteEnvironment implements EnvironmentInterface
{
    public const CLIENT = NetsuiteClient::class;

    public function __construct(
        private string $realm,
        private string $consumerKey,
        private string $consumerSecret,
        private string $token,
        private string $tokenSecret,
        private string $baseUri
    ) {}

    public function getRealm()
    {
        return $this->realm;
    }

    public function getConsumerKey()
    {
        return $this->consumerKey;
    }

    public function getConsumerSecret()
    {
        return $this->consumerSecret;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getTokenSecret()
    {
        return $this->tokenSecret;
    }

    public function getBaseUri()
    {
        return $this->baseUri;
    }
}