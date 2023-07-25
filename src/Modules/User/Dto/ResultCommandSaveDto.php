<?php

namespace Desafio\Modules\User\Dto;

use Desafio\Modules\User\Model\User;
use JsonSerializable;

class ResultCommandSaveDto implements JsonSerializable
{
  private string $name;
  private string $nis;
  private int    $id;
  private bool   $status = false;

  public function __construct(User $user, int $id)
  {
    $this->name = $user->getName();
    $this->nis = $user->getNis()->nis;
    $this->id  = $id;
  }

  public function jsonSerialize(): array
  {
    return [
      'status' => $this->status,
      'data'   => [
        'name' => $this->name,
        'nis'  => $this->nis,
        'id'   => $this->id
      ]
    ];
  }
}