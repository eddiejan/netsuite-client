<?php

namespace Eddiejan\NetsuiteClient\DependencyInjection;

use Eddiejan\NetsuiteClient\Client;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class ClientPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container->register('netsuite.client', Client::class)
            ->addArgument(new Reference('http_client'))
        ;

        $container->addAliases([
            Client::class => 'netsuite.client'
        ]);
    }
}