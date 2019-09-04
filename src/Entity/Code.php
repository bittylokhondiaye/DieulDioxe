<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CodeRepository")
 */
class Code
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CodeRetrait;

    /**
     * @ORM\Column(type="boolean")
     */
    private $SiRetire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeRetrait(): ?string
    {
        return $this->CodeRetrait;
    }

    public function setCodeRetrait(string $CodeRetrait): self
    {
        $this->CodeRetrait = $CodeRetrait;

        return $this;
    }

    public function getSiRetire(): ?bool
    {
        return $this->SiRetire;
    }

    public function setSiRetire(bool $SiRetire): self
    {
        $this->SiRetire = $SiRetire;

        return $this;
    }
}
