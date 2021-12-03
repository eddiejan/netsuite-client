<?php

namespace Eddiejan\NetsuiteClient\DependencyInjection;

use Eddiejan\NetsuiteClient\Repository\NetsuiteAbstractRepository;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Reference;

final class NetsuiteClientPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container->register('netsuite.client', NetsuiteAbstractRepository::class);
    }
}