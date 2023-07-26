<?php

namespace Desafio\Modules\User\Dto;

use Desafio\Modules\User\Model\User;

readonly class SaveModelRepositoryDto
{
  public User $user;

  /**
   * @param string $user
   */
  public function __construct(string $user)
  {
    $this->user = $user;
  }
}