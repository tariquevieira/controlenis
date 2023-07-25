<?php

namespace Desafio\Modules\User\Model\Factory;

use Desafio\Modules\User\Model\Nis;

class NisFactory
{
  public function create(string $nis = null): Nis
  {
    $idNis = empty($nis) ? $this->generateNis() : $nis;
    $nis = new Nis($idNis);
    return $nis;
  }

  private function generateNis(): string
  {
    $idNis = '';
    for ($i = 0; $i <11; $i++) {
     $idNis .= rand(0,9);
    }
    return $idNis;
  }
}