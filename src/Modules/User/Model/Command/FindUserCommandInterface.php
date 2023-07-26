<?php

namespace Desafio\Modules\User\Model\Command;

use Desafio\Modules\User\Dto\FormFindUserDto;

interface FindUserCommandInterface
{
  public function execute(FormFindUserDto $dto);
}