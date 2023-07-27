<?php

namespace Test\Unit\Modules\User\Model\Command;

use Desafio\Data\Repository\UserRepository;
use Desafio\Modules\User\Dto\FormFindUserDto;
use Desafio\Modules\User\Dto\RepositoryFindModelDto;
use Desafio\Modules\User\Model\Command\FindUserCommand;
use Desafio\Modules\User\Model\Factory\UserFactory;
use Desafio\Modules\User\Model\Nis;
use Desafio\Modules\User\Model\User;
use PHPUnit\Framework\TestCase;

class FindUserCommandTest extends TestCase
{
  private FindUserCommand $testClass;
  private UserRepository  $repository;
  private UserFactory     $userFactory;
  private User            $user;

  public function setUp(): void
  {
    $this->userFactory = $this->createMock(UserFactory::class);
    $this->user        = $this->createMock(User::class);
    
    $this->repository  = $this->createMock(UserRepository::class);
    $this->testClass   = new FindUserCommand($this->repository);
  }

  /**
   * Undocumented function
   *
   * @param array $data
   * @return void
   * @dataProvider provider
   */
  public function testExecute(array $data): void
  {
    $nisExpected = $data['nis'];
    $repositoryDto = new RepositoryFindModelDto(
      $data['success'],
      $data['message'],
      $data['id'],
      $data['name'],
      $data['nis'],
    );

    $this->repository
      ->expects($this->once())
      ->method('find')
      ->willReturn($repositoryDto);
    $

    $this->userFactory
      ->expects($this->exactly($data['qtd_userFactory']))
      ->method('create')
      ->with($repositoryDto->name, $repositoryDto->nis, $repositoryDto->id)
      ->willReturn($this->user);

    $this->user
    ->expects($this->exactly($data['qtd_userFactory']))
    ->method('getNis')
    ->willReturn(new Nis($data['nis']));

      $formDto = new FormFindUserDto($data['nis']);
      $user = $this->testClass->execute($formDto);
      $nis = $user->getnis()->nis;
      $this->assertEquals($nisExpected, $nis);
  }

  /**
   * Data Provider Mehtod
   *
   * @return array
   */
  public static function provider(): array
  {
    return [
      'when sucess find' =>  [
        [
          'success' => true,
          'id'   => 1,
          'name' => 'tarique',
          'nis'  => '12826250203',
          'qtd_userFactory' => 1,
          'message' => 'Usuario encontrado'
        ]
      ],
    ];
  }
}