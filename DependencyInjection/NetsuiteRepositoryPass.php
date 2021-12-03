<?php

namespace Eddiejan\NetsuiteClient\DependencyInjection;

use Eddiejan\NetsuiteClient\NetsuiteClient;
use Eddiejan\NetsuiteClient\Repository\NetsuiteAbstractRepository;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class NetsuiteRepositoryPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container->register(NetsuiteAbstractRepository::class, NetsuiteAbstractRepository::class)
            ->addArgument('%netsuite.client%')
        ;
    }
}