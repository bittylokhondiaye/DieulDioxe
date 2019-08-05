<?php

namespace App\Entity;


use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CompteRepository")
 */
class Compte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $NumeroCompte;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * 
     * @var \DateTime
     * 
     */
    private $DateCreation;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $MontantInitial;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Range(min="75000")
     */
    private $MontantDeposer;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $Solde;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partenaire")
     */
    private $Partenaire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserPartenaire", mappedBy="compte")
     */
    private $UserPartenaire;

    public function __construct()
    {
        $this->UserPartenaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCompte(): ?int
    {
        return $this->NumeroCompte;
    }

    public function setNumeroCompte(int $NumeroCompte): self
    {
        $this->NumeroCompte = $NumeroCompte;

        return $this;
    }


    /**
     * Get the value of DateCreation
     *
     * @return  \DateTime
     */

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    /**
     * Set the value of DateCreation
     *
     * @param  \DateTime  $DateCreation
     *
     * @return  self
     */

    public function setDateCreation(\DateTimeInterface $DateCreation) 
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    public function getMontantInitial(): ?int
    {
        return $this->MontantInitial;
    }

    public function setMontantInitial(int $MontantInitial): self
    {
        $this->MontantInitial = $MontantInitial;

        return $this;
    }

    public function getMontantDeposer(): ?int
    {
        return $this->MontantDeposer;
    }

    public function setMontantDeposer(int $MontantDeposer): self
    {
        $this->MontantDeposer = $MontantDeposer;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->Solde;
    }

    public function setSolde(int $Solde): self
    {
        $this->Solde = $Solde;

        return $this;
    }

    public function getPartenaire(): ?Partenaire
    {
        return $this->Partenaire;
    }

    public function setPartenaire(?Partenaire $Partenaire): self
    {
        $this->Partenaire = $Partenaire;

        return $this;
    }

    /**
     * @return Collection|UserPartenaire[]
     */
    public function getUserPartenaire(): Collection
    {
        return $this->UserPartenaire;
    }

    public function addUserPartenaire(UserPartenaire $userPartenaire): self
    {
        if (!$this->UserPartenaire->contains($userPartenaire)) {
            $this->UserPartenaire[] = $userPartenaire;
            $userPartenaire->setCompte($this);
        }

        return $this;
    }

    public function removeUserPartenaire(UserPartenaire $userPartenaire): self
    {
        if ($this->UserPartenaire->contains($userPartenaire)) {
            $this->UserPartenaire->removeElement($userPartenaire);
            // set the owning side to null (unless already changed)
            if ($userPartenaire->getCompte() === $this) {
                $userPartenaire->setCompte(null);
            }
        }

        return $this;
    }
}
