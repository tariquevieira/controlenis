<?php

use DataBase\Connection\ConnectionCreatorInterface;
use DataBase\Connection\ConnectionCreatorPdo;
use Desafio\Data\Repository\UserRepository;
use Desafio\Data\Repository\UserRepositoryInterface;
use Desafio\Modules\User\Model\Command\StoreUserCommand;
use Desafio\Modules\User\Model\Command\StoreUserCommandInterface;
use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
  ConnectionCreatorInterface::class => new ConnectionCreatorPdo(),
  UserRepositoryInterface::class    => new UserRepository((new ConnectionCreatorPdo())->createConnection()),
  StoreUserCommandInterface::class  => DI\get(StoreUserCommand::class),

]);

return $containerBuilder->build();
