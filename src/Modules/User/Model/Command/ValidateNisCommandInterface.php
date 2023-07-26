<?php

namespace Desafio\Modules\User\Model\Command;

interface ValidateNisCommandInterface
{
  /**
   * Verifica validação nis
   *
   * @param string|null $nis
   * @return boolean
   */
  public function execute(?string $nis = null): bool;
}