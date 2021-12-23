<?php

namespace Eddiejan\NetsuiteClient\Repository;

use Eddiejan\NetsuiteClient\NetsuiteClient;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Serializer\SerializerInterface;

class NetsuiteAbstractRepository
{
    protected string $endpoint;
    protected string $model;

    public function __construct(
        protected NetsuiteClient $client,
        protected MessageBusInterface $bus,
        protected SerializerInterface $serializer
    ) {}
}