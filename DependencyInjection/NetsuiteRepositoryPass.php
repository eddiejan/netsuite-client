<?php

namespace Eddiejan\NetsuiteClient\DependencyInjection;

use Eddiejan\NetsuiteClient\NetsuiteClient;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class NetsuiteRepositoryPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container->register(NetsuiteRepositoryPass::class, NetsuiteRepositoryPass::class)
            ->addArgument('%netsuite.client%')
        ;
    }
}