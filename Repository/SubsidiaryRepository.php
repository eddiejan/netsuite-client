<?php

namespace Eddiejan\NetsuiteClient\Repository;

use Eddiejan\NetsuiteClient\Model\Subsidiary;
use Eddiejan\NetsuiteClient\Repository\Traits\SupportsGetTrait;

class SubsidiaryRepository extends AbstractRepository
{
    use SupportsGetTrait;

    protected string $endpoint = 'subsidiary';
    protected string $model = Subsidiary::class;
}