<?php

namespace Eddiejan\NetsuiteClient\Repository\Traits;

use Eddiejan\NetsuiteClient\Model\Subsidiary;

trait SupportsGetTrait
{
    public function find(int $id) {
        return $this->serializer->deserialize(
            data: $this->client->request('GET', '/services/rest/record/v1/subsidiary/' . $id)->getContent(false),
            type: Subsidiary::class,
            format: 'json',
            context: []
        );
    }

    public function findAll() {
        return [];
    }
}