<?php

namespace Desafio\Commons\Http\Controller\User;

use Desafio\Modules\User\Dto\FormFindUserDto;
use Desafio\Modules\User\Dto\FormStoreUserDto;
use Desafio\Modules\User\Model\Command\FindUserCommandInterface;
use Desafio\Modules\User\Model\Command\StoreUserCommandInterface;
use Desafio\Modules\User\Model\Command\ValidateNisCommand;
use Desafio\Modules\User\Model\Command\ValidateNisCommandInerface;
use Desafio\Modules\User\Model\Nis;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FindUserController implements RequestHandlerInterface
{
 
  public function __construct(
    private FindUserCommandInterface $findCommand
    )
  {
  }

  /**
   * Handle Request
   *
   * @param ServerRequestInterface $request
   * @return ResponseInterface
   */
  public function handle(ServerRequestInterface $request): ResponseInterface
  {
    try {
      $nis = $request->getQueryParams()['nis'];
      
      $dto = new FormFindUserDto(htmlspecialchars($nis));
      $user = $this->findCommand->execute($dto);

      http_response_code(201);
      return new Response(headers: ['Content-Type' => 'application/json'], body: json_encode($user));
    } catch (\Exception $e) {
      http_response_code(500);
      return new Response(body: $e->getMessage());
    }
  }
}