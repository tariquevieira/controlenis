<?php

namespace Desafio\Commons\Http\Proxy\User;

use Desafio\Commons\Http\Controller\User\StoreUserController;
use Desafio\Commons\Http\ControllerProxy;
use Desafio\Produto\Exceptions\InvalidMethodException;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class StoreUserControllerProxy extends ControllerProxy
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
        'post'
      )) {
        throw new InvalidMethodException('Invalid Http verb for this method.');
      }

      if (count($request->getParsedBody()) == 0) {
        throw new InvalidArgumentException('it is necessary to inform the name field');
      }

      return $this->handleController(StoreUserController::class, $request);
    } catch (InvalidMethodException | InvalidArgumentException $e) {
      return $this->returnError(400, $e->getMessage());
    } catch (\Exception $e) {
      return $this->returnError(500, $e->getMessage());
    }
  }
}