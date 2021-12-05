<?php

namespace Eddiejan\NetsuiteClient\DependencyInjection;

use Eddiejan\NetsuiteClient\Message\NetsuiteMessage;
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
        $config['messenger']['transports']['netsuite']['dsn'] = '%env(MESSENGER_TRANSPORT_DSN)%';
        $config['messenger']['routing'] = [NetsuiteMessage::class => 'netsuite'];

        $container->prependExtensionConfig('framework', $config);

        dump($container->getExtensionConfig('framework'));
    }
}