<?php

namespace Desafio\Modules\User\Model;

class User implements \JsonSerializable
{
  /**
   * Metodo construtor
   *
   * @param string $name
   * @param Nis $nis
   * @param integer|null $id
   */
  public function __construct(
    private string $name,
    private Nis $nis,
    private ?int $id = null,
    ) {}

  /**
   * Seta name
   *
   * @param string $name
   * @return self
   */
  public function setName(string $name): self
  {
    $this->name = $name;
    return $this;
  }

  /**
   * Retorna nome
   *
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * Seta Nis
   *
   * @param string $nis
   * @return self
   */
  public function setNis(Nis $nis): self
  {
    $this->nis = $nis;
    return $this;
  }

  public function getNis(): Nis
  {
    return $this->nis;
  }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Serializador de classe
     *
     * @return mixed
     */
    public function jsonserialize(): mixed
    {
      return [
        'id'   => $this->getId(),
        'name' => $this->getName(),
        'nis'  => $this->getnis()->nis,
      ];
    }
}