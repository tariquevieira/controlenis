<?php

namespace Desafio\Commons\Exceptions;

class NotFoundUserException extends \Exception
{
  public function __construct(string $message)
  {
    parent::__construct($message);
  }
}