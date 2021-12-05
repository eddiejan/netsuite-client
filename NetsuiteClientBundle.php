<?php

namespace Eddiejan\NetsuiteClient;

use Eddiejan\NetsuiteClient\DependencyInjection\NetsuiteClientPass;
use Eddiejan\NetsuiteClient\DependencyInjection\NetsuiteExtension;
use Eddiejan\NetsuiteClient\DependencyInjection\NetsuiteRepositoryPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class NetsuiteClientBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new NetsuiteClientPass());
        $container->addCompilerPass(new NetsuiteRepositoryPass());
    }

    public function getContainerExtension(): ExtensionInterface
    {
        return new NetsuiteExtension();
    }
}