<?php

namespace Desafio\Data\Repository;

use Desafio\Modules\User\Dto\RepositoryFindModelDto;
use Desafio\Modules\User\Dto\RepositorySaveModelDto;
use Desafio\Modules\User\Model\User;

interface UserRepositoryInterface
{
  public function save(User $user): RepositorySaveModelDto;
  public function find(string $nis): RepositoryFindModelDto;
}