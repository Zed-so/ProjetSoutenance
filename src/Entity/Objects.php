<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ObjectsRepository")
 */
class Objects
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $repas;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $heal = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $clothes = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $weapons = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $objects = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepas(): ?int
    {
        return $this->repas;
    }

    public function setRepas(?int $repas): self
    {
        $this->repas = $repas;

        return $this;
    }

    public function getHeal(): ?array
    {
        return $this->heal;
    }

    public function setHeal(?array $heal): self
    {
        $this->heal = $heal;

        return $this;
    }

    public function getClothes(): ?array
    {
        return $this->clothes;
    }

    public function setClothes(?array $clothes): self
    {
        $this->clothes = $clothes;

        return $this;
    }

    public function getWeapons(): ?array
    {
        return $this->weapons;
    }

    public function setWeapons(?array $weapons): self
    {
        $this->weapons = $weapons;

        return $this;
    }

    public function getObjects(): ?array
    {
        return $this->objects;
    }

    public function setObjects(?array $objects): self
    {
        $this->objects = $objects;

        return $this;
    }
}
