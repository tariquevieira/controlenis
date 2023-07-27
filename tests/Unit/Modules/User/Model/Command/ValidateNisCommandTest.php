<?php

namespace  Tests\Unit\Modules\User\Model\Command;

use Desafio\Modules\User\Model\Command\ValidateNisCommand;
use PHPUnit\Framework\TestCase;

class ValidateNisCommandTest extends TestCase
{
  private ValidateNisCommand $testClass;

  public function setUp(): void
  {
    $this->testClass = new ValidateNisCommand();
  }

  /**
   * @return void
   */
  public function testIsValidNis(): void
  {
    $nis = '12826250203';
    $result = $this->testClass->execute($nis);

    $this->assertTrue($result);
  }

  /**
   * @return void
   */
  public function testIsValidNisWhenNisHasLessNumbers(): void
  {
    $nis = '1282625020';
    $result = $this->testClass->execute($nis);

    $this->assertFalse($result);
  }

  /**
   * @return void
   */
  public function testIsValidNisWhenNisHasMoreNumbers(): void
  {
    $nis = '12826250203111';
    $result = $this->testClass->execute($nis);

    $this->assertFalse($result);
  }

  /**
   * @return void
   */
  public function testIsValidNisWhenNisHasLetters(): void
  {
    $nis = '128262502qa';
    $result = $this->testClass->execute($nis);

    $this->assertFalse($result);
  }
}