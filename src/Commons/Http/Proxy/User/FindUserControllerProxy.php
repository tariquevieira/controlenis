<?php

namespace Desafio\Commons\Http\Proxy\User;

use Desafio\Commons\Http\Controller\User\FindUserController;
use Desafio\Commons\Http\ControllerProxy;
use Desafio\Modules\User\Model\Command\ValidateNisCommand;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class FindUserControllerProxy extends ControllerProxy
{
  public function __construct()
  {
    parent::__construct();
  }

  public function handle(ServerRequestInterface $request): ResponseInterface
  {
    try {
      if (!$this->verifyMethod(
        $request->getServerParams()["REQUEST_METHOD"],
        'get'
      )) {
        throw new \Exception('Invalid Http verb for this method.');
      }

      $validateCommand = new ValidateNisCommand();
      
      $nis = $request->getQueryParams()['nis'];
      if (!$validateCommand->execute($nis)) {
        throw new InvalidArgumentException("The argument is invalid");
      }

      return $this->handleController(FindUserController::class, $request);
    } catch ( InvalidArgumentException $e) {
      return $this->returnError(400, $e->getMessage());
    } catch (\Exception $e) {
      return $this->returnError(500, $e->getMessage());
    }
  }
}