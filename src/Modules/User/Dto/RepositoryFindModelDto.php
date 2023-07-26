<?php

namespace Desafio\Modules\User\Dto;

readonly class RepositoryFindModelDto
{
  public bool $success;
  public ?string $message;
  public ?int    $id;
  public ?string $name;
  public ?string $nis;

  /**
   *
   * @param boolean $success
   * @param string|null $message
   * @param integer|null $id
   * @param string|null $name
   * @param string|null $nis
   */
  public function __construct(
    bool $success,
    string $message = null,
    int $id = null, 
    string $name = null, 
    string $nis = null)
  {
    $this->success = $success;
    $this->message = $message;
    $this->id = $id;
    $this->name = $name;
    $this->nis = $nis;
  }
}