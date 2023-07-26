<?php

namespace Desafio\Data\Repository;

use Desafio\Commons\Exceptions\NotFoundUserException;
use Desafio\Modules\User\Dto\RepositoryFindModelDto;
use Desafio\Modules\User\Dto\RepositorySaveModelDto;
use Desafio\Modules\User\Model\User;
use PDO;
use PDOException;

class UserRepository implements UserRepositoryInterface
{
  /**
   *
   * @param PDO $connection
   */
  public function __construct(private PDO $connection)
  {
  }

   /**
   * @inheritDoc
   */
  public function find(string $nis): RepositoryFindModelDto
  {
    try {
      $sqlQuery = 'SELECT * FROM users where nis = :nis';
      $statement = $this->connection->prepare($sqlQuery);
      $statement->bindValue(':nis', $nis);
      $statement->execute();
      $result = $statement->fetch();

      if (empty($result)) {
        throw new NotFoundUserException('Usuario nao encontrado');
      }
      
      $dto = new RepositoryFindModelDto(
        success: true,
        id: (int)$result['id'],
        name: $result['name'],
        nis: $result['nis'],
        message: 'Encontrado'
      );
      return $dto;
    } catch (NotFoundUserException $e) {
      throw new NotFoundUserException($e->getMessage());
    } catch (\Exception $e) {
      $dto = new RepositoryFindModelDto(
       false,
       $e->getMessage(),
      );
      return $dto;
    }
  } 
 
   /**
   * @inheritDoc
   */
  public function save(User $user): RepositorySaveModelDto
  { 
    try {
      $insertQuery = 'INSERT INTO users (name,nis) VALUES (:name,:nis);';
      $statement = $this->connection->prepare($insertQuery);

      $success = $statement->execute([
        ':name' => $user->getName(),
        ':nis' => $user->getnis()->nis,
      ]);
      
      if ($success) {
        $resultDto = new RepositorySaveModelDto(
          true, 
          'Usuario salvo',
          $this->connection->lastInsertId()
        );
      }
      return $resultDto;
    } catch (\Exception $e) {
      $resultDto = new RepositorySaveModelDto(false,$e->getMessage());
      return $resultDto;
    }
  }
}