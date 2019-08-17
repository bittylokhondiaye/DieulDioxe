<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CommissionsRepository")
 */
class Commissions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $BorneInf;

    /**
     * @ORM\Column(type="integer")
     */
    private $BorneSup;

    /**
     * @ORM\Column(type="integer")
     */
    private $Frais;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorneInf(): ?int
    {
        return $this->BorneInf;
    }

    public function setBorneInf(int $BorneInf): self
    {
        $this->BorneInf = $BorneInf;

        return $this;
    }

    public function getBorneSup(): ?int
    {
        return $this->BorneSup;
    }

    public function setBorneSup(int $BorneSup): self
    {
        $this->BorneSup = $BorneSup;

        return $this;
    }

    public function getFrais(): ?int
    {
        return $this->Frais;
    }

    public function setFrais(int $Frais): self
    {
        $this->Frais = $Frais;

        return $this;
    }


}
