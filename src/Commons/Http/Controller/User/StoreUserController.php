<?php

namespace Desafio\Commons\Http\Controller\User;

use Desafio\Modules\User\Dto\FormStoreUserDto;
use Desafio\Modules\User\Model\Command\StoreUserCommandInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class StoreUserController implements RequestHandlerInterface
{
 
  public function __construct(private StoreUserCommandInterface $storeCommand)
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
      $body = $request->getParsedBody();
      $dto = new FormStoreUserDto(htmlspecialchars($body['name']));
      $user = $this->storeCommand->execute($dto);

      http_response_code(201);
      return new Response(headers: ['Content-Type' => 'application/json'], body: json_encode($user));
    } catch (\Exception $e) {
      http_response_code(500);
      return new Response(body: $e->getMessage());
    }
  }
}