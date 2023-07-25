<?php

namespace Desafio\Modules\User\Model\Factory;

use Desafio\Modules\User\Model\User;

class UserFactory
{
  public function create(string $name, string $nis = null): User
  {
    $nisFactory = new NisFactory();
    $nis = $nisFactory->create($nis);

    $user = new User($name, $nis);
    return $user;
  }
}