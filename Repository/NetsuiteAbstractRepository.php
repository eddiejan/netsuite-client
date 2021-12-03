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
        private NetsuiteClient $client,
        private MessageBusInterface $bus,
        private SerializerInterface $serializer
    ) {}
}