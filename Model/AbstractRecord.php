<?php

namespace Eddiejan\NetsuiteClient\Model;

class AbstractRecord
{
    public function __construct (
        private ?string $id,
        private ?string $externalId
    ) {}

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }
}