<?php

namespace Desafio\Modules\User\Model\Command;

use Desafio\Modules\User\Dto\FormStoreUserDto;
use Desafio\Modules\User\Model\User;

interface StoreUserCommandInterface
{
  public function execute(FormStoreUserDto $dto): User;
}