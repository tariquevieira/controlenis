<?php

namespace Desafio\Modules\User\Model\Command;

use Desafio\Commons\Exceptions\NotFoundUserException;
use Desafio\Data\Repository\UserRepositoryInterface;
use Desafio\Modules\User\Dto\FormFindUserDto;
use Desafio\Modules\User\Model\Factory\UserFactory;
use Desafio\Modules\User\Model\User;

class FindUserCommand implements FindUserCommandInterface
{
  public function __construct(private UserRepositoryInterface $repository)
  {

  }
  
  /**
   * @inheritDoc
   */
  public function execute(FormFindUserDto $dto): User
  {
    try {
      $userFactory = new UserFactory();

      $result = $this->repository->find($dto->nis);
      if (!$result->success) {
        throw new \Exception($result->message);
      }
      $user = $userFactory->create($result->name, $result->nis, $result->id);
      return $user;
      return $dto;
    } catch (NotFoundUserException $e) {
      throw new NotFoundUserException($e->getMessage());
    } catch (\Exception $e) {
        throw new \Exception($e->getMessage());
    }
  }
}