<?php

namespace Desafio\Data\Repository;

use Desafio\Modules\User\Dto\RepositoryFindModelDto;
use Desafio\Modules\User\Dto\RepositorySaveModelDto;
use Desafio\Modules\User\Model\User;

interface UserRepositoryInterface
{
  /**
   * Salva usuario
   *
   * @param User $user
   * @return RepositorySaveModelDto
   */
  public function save(User $user): RepositorySaveModelDto;

  /**
   * Buscar usuario
   *
   * @param string $nis
   * @return RepositoryFindModelDto
   */
  public function find(string $nis): RepositoryFindModelDto;
}