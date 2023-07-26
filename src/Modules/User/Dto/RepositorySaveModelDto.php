<?php

namespace Desafio\Modules\User\Dto;

readonly class RepositorySaveModelDto
{
  public bool   $isInserted;
  public string $message;
  public ?int   $id;

  /**
   * @param boolean $isInserted
   * @param string $message
   * @param integer|null $id
   */
  public function __construct(bool $isInserted,string $message = '', int $id = null)
  {
    $this->isInserted = $isInserted;
    $this->message = $message;
    $this->id = $id;
  }
}