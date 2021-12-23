<?php

namespace Eddiejan\NetsuiteClient\DependencyInjection;

use Eddiejan\NetsuiteClient\Repository\NetsuiteAbstractRepository;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class NetsuiteRepositoryPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container->register('netsuite.repository', NetsuiteAbstractRepository::class)
            ->addArgument(new Reference('netsuite.client'))
            ->addArgument(new Reference('messenger.bus.default'))
            ->addArgument(new Reference('serializer'))
        ;

        $container->addAliases([NetsuiteAbstractRepository::class => 'netsuite.repository']);
    }
}