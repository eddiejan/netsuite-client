<?php

namespace Eddiejan\NetsuiteClient\Repository;

use Eddiejan\NetsuiteClient\Model\Subsidiary;
use Eddiejan\NetsuiteClient\Repository\Traits\SupportsGetTrait;

class NetsuiteAccountRepository extends NetsuiteAbstractRepository
{
    use SupportsGetTrait;

    protected string $endpoint = 'account';
    protected string $model = Subsidiary::class;
}