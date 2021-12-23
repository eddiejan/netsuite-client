<?php

namespace Eddiejan\NetsuiteClient\Repository;

use Eddiejan\NetsuiteClient\Model\Account;
use Eddiejan\NetsuiteClient\Repository\Traits\SupportsGetTrait;

class NetsuiteAccountRepository extends NetsuiteAbstractRepository
{
    use SupportsGetTrait;

    protected string $endpoint = 'account';
    protected string $model = Account::class;
}