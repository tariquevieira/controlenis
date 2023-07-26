<?php

namespace Desafio\Modules\User\Model\Command;

interface ValidateNisCommandInterface
{
  public function execute(?string $nis = null): bool;
}