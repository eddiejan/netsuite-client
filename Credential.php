<?php

namespace Eddiejan\NetsuiteClient;

use Eddiejan\Package\CredentialInterface;

final class Credential implements CredentialInterface
{
    public const CLIENT = Client::class;

    public function __construct(
        private string $realm,
        private string $consumerKey,
        private string $consumerSecret,
        private string $token,
        private string $tokenSecret,
        private string $baseUri
    ) {}

    public function getRealm(): string
    {
        return $this->realm;
    }

    public function getConsumerKey(): string
    {
        return $this->consumerKey;
    }

    public function getConsumerSecret(): string
    {
        return $this->consumerSecret;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getTokenSecret(): string
    {
        return $this->tokenSecret;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }
}