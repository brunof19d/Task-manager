<?php

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    \Doctrine\ORM\EntityManagerInterface::class => function () {
        return (new \App\Infrastructure\EntityManagerCreator())->getEntityManager();
    }
]);
return $builder->build();





