<?php

namespace Desafio\Modules\User\Model;

class User implements \JsonSerializable
{
  public function __construct(
    private string $name,
    private Nis $nis,
    private ?int $id = null,
    ) {}

  /**
   * Undocumented function
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
   * Undocumented function
   *
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * Undocumented function
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

    public function jsonserialize(): mixed
    {
      return [
        'id'   => $this->getId(),
        'name' => $this->getName(),
        'nis'  => $this->getnis()->nis,
      ];
    }
}