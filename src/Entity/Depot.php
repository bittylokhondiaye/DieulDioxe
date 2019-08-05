<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormTypeInterface;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\DepotRepository")
 */
class Depot
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
    private $Montant;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $Date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compte", inversedBy="depots")
     */
    private $Compte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->Montant;
    }

    public function setMontant(int $Montant): self
    {
        $this->Montant = $Montant;

        return $this;
    }

    /**
     * Get the value of Date
     *
     * @return  \DateTime
     */

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }


    /**
     * Set the value of Date
     *
     * @param  \DateTime  $Date
     *
     * @return  self
     */

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->Compte;
    }

    public function setCompte(?Compte $Compte): self
    {
        $this->Compte = $Compte;

        return $this;
    }
}
