<?php

namespace Desafio\Commons\Exceptions;

class InvalidMethodException extends \Exception
{
  public function __construct(string $message)
  {
    parent::__construct($message);
  }
}