<?php

namespace Eddiejan\NetsuiteClient\Repository;

use Eddiejan\NetsuiteClient\Model\Subsidiary;
use Eddiejan\NetsuiteClient\Repository\Traits\SupportsGetTrait;

final class NetsuiteSubsidiaryRepository extends NetsuiteAbstractRepository
{
    use SupportsGetTrait;

    protected string $endpoint = 'subsidary';
    protected string $model = Subsidiary::class;
}