<?php

namespace Desafio\Modules\User\Model;

readonly class Nis
{
  public string $nis;
  public function __construct(string $nis) 
  {
    $this->nis = $nis;
  }
}