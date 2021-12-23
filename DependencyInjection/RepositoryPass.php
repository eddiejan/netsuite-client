<?php

namespace Eddiejan\NetsuiteClient\DependencyInjection;

use Eddiejan\NetsuiteClient\Repository\AccountRepository;
use Eddiejan\NetsuiteClient\Repository\SubsidiaryRepository;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class RepositoryPass implements CompilerPassInterface
{
    private array $repositories = [
        SubsidiaryRepository::class,
        AccountRepository::class,
    ];

    public function process(ContainerBuilder $container)
    {
        foreach($this->repositories as $repository) {
            $container->register($repository, $repository)
                ->addArgument(new Reference('netsuite.client'))
                ->addArgument(new Reference('messenger.bus.default'))
                ->addArgument(new Reference('serializer'))
            ;
        }
    }
}