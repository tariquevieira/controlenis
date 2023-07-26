<?php

namespace Desafio\Modules\User\Dto;

readonly class RepositoryFindModelDto
{
  public bool $success;
  public ?string $message;
  public ?int    $id;
  public ?string $name;
  public ?string $nis;

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