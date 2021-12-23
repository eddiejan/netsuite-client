<?php

namespace Eddiejan\NetsuiteClient\Repository\Traits;

trait SupportsGetTrait
{
    public function find(int $id) {
        return $this->client->request('GET', '/services/rest/record/v1/subsidiary')->getContent(false);
    }

    public function findAll() {
        return [];
    }
}