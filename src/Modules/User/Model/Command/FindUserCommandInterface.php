<?php

namespace Desafio\Modules\User\Model\Command;

use Desafio\Modules\User\Dto\FormFindUserDto;

interface FindUserCommandInterface
{
  /**
   * Busca usuario
   *
   * @param FormFindUserDto $dto
   * @return void
   */
  public function execute(FormFindUserDto $dto);
}