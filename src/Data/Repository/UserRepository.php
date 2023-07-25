<?php

namespace Desafio\Data\Repository;

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

 
  /* public function findCategoryByCode(int $code): array
  {
    try {
      $sqlQuery = 'SELECT * FROM categories where code = :code';
      $statement = $this->connection->prepare($sqlQuery);
      $statement->bindValue(':code', $code);
      $statement->execute();
      //$category = $this->hydrateCategories($statement);
      return $category[0];
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), 302);
    }
  } */

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
    } catch (\PDOException $e) {
      $resultDto = new RepositorySaveModelDto(false,$e->getMessage());
      return $resultDto;
    }
  }
}