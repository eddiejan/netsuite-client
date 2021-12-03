<?php

namespace Eddiejan\NetsuiteClient\DependencyInjection;

use Eddiejan\NetsuiteClient\NetsuiteClient;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class NetsuiteClientPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container->register('netsuite.client', NetsuiteClient::class);
    }
}