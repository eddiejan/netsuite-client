<?php

namespace Eddiejan\NetsuiteClient\DependencyInjection;

use Eddiejan\NetsuiteClient\NetsuiteClient;
use Eddiejan\NetsuiteClient\Repository\NetsuiteAbstractRepository;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class NetsuiteRepositoryPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container->register(NetsuiteAbstractRepository::class, NetsuiteAbstractRepository::class)
            ->addArgument(new Reference('netsuite.client'))
            ->addArgument(new Reference('messenger.bus.default'))
            ->addArgument(new Reference('serializer'))
        ;
    }
}