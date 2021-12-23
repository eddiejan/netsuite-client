<?php

namespace Eddiejan\NetsuiteClient;

use Eddiejan\NetsuiteClient\DependencyInjection\ClientPass;
use Eddiejan\NetsuiteClient\DependencyInjection\RepositoryPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class ClientBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ClientPass());
        $container->addCompilerPass(new RepositoryPass());
    }
}