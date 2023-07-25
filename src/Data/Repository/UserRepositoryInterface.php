<?php

namespace Desafio\Data\Repository;

use Desafio\Modules\User\Dto\RepositorySaveModelDto;
use Desafio\Modules\User\Model\User;

interface UserRepositoryInterface
{
  public function save(User $user): RepositorySaveModelDto;
}