<?php

namespace Desafio\Modules\User\Model\Command;

use Desafio\Data\Repository\UserRepositoryInterface;
use Desafio\Modules\User\Dto\FormStoreUserDto;
use Desafio\Modules\User\Model\Factory\UserFactory;
use Desafio\Modules\User\Model\User;

class StoreUserCommand implements StoreUserCommandInterface
{
  public function __construct(private UserRepositoryInterface $repository)
  {

  }

  /**
   * @inheritDoc
   */
  public function execute(FormStoreUserDto $dto): User
  {
    try {
        $userFactory = new UserFactory();
        $user = $userFactory->create($dto->name);
        $result = $this->repository->save($user);
      
        if (false === $result->isInserted) {
            throw new \Exception($result->message);
        }

        $user->setId($result->id);
        return $user;
    } catch (\Exception $e) {
        throw new \Exception($e->getMessage());
    }
  }
}