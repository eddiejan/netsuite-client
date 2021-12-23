<?php

namespace Eddiejan\NetsuiteClient\Repository;

use Eddiejan\NetsuiteClient\Client;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractRepository
{
    protected string $endpoint;
    protected string $model;

    public function __construct(
        protected Client              $client,
        protected MessageBusInterface $bus,
        protected SerializerInterface $serializer
    ) {}
}