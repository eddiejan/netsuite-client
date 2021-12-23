<?php

namespace Eddiejan\NetsuiteClient;

use Eddiejan\NetsuiteClient\DependencyInjection\NetsuiteClientPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class NetsuiteClientBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new NetsuiteClientPass());
    }
}