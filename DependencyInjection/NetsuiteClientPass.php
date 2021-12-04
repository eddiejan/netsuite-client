<?php

namespace Eddiejan\NetsuiteClient\DependencyInjection;

use Eddiejan\NetsuiteClient\NetsuiteClient;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class NetsuiteClientPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container->register('netsuite.client', NetsuiteClient::class)
            ->addArgument(new Reference('http_client'))
        ;


    }
}