<?php

namespace Desafio\Modules\User\Dto;

readonly class FormStoreUserDto
{
  public string $name;

  /**
   *
   * @param string $name
   */
  public function __construct(string $name)
  {
    $this->name = $name;
  }
}