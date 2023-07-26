<?php

namespace Desafio\Modules\User\Model\Factory;

use Desafio\Modules\User\Model\User;

class UserFactory
{
  /**
   * Cria novo usuario
   *
   * @param string $name
   * @param string|null $nis
   * @param integer|null $id
   * @return User
   */
  public function create(string $name, string $nis = null, int $id = null): User
  {
    $nisFactory = new NisFactory();
    $nis = $nisFactory->create($nis);

    $user = new User($name, $nis, $id);
    return $user;
  }
}