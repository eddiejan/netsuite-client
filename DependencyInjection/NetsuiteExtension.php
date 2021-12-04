<?php

namespace Eddiejan\NetsuiteClient\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class NetsuiteExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {
        // TODO: Implement load() method.
    }

    public function prepend(ContainerBuilder $container)
    {
        $configs = $container->getExtensionConfig('messenger');

        dump($container);
    }
}