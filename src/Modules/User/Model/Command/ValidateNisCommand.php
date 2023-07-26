<?php

namespace Desafio\Modules\User\Model\Command;

class ValidateNisCommand implements ValidateNisCommandInterface
{
  /**
   * @inheritDoc
   */
  public function execute(?string $nis = null): bool
  {
    $pattern= "/[0-9]{11}/"; 

    if(preg_match($pattern, $nis) == 1){
      return true;
    }
    
    return false;
  }
}