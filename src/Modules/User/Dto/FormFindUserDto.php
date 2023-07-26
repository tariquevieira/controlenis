<?php

namespace Desafio\Modules\User\Dto;

readonly class FormFindUserDto
{
  public string $nis;

  /**
   * Undocumented function
   *
   * @param string $nis
   */
  public function __construct(string $nis)
  {
    $this->nis = $nis;
  }
}