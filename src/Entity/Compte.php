<?php

namespace App\Entity;


use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormTypeInterface;


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
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $NumeroCompte;

    /**
     * @ORM\Column(type="datetime")
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Depot", mappedBy="Compte")
     */
    private $depots;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="Compte")
     */
    private $transactions;

     

    

    public function __construct()
    {
        $this->UserPartenaire = new ArrayCollection();
        $this->depots = new ArrayCollection();
        $this->transactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCompte(): ?string
    {
        return $this->NumeroCompte;
    }

    public function setNumeroCompte(string $NumeroCompte): self
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

    /**
     * @return Collection|Depot[]
     */
    public function getDepots(): Collection
    {
        return $this->depots;
    }

    public function addDepot(Depot $depot): self
    {
        if (!$this->depots->contains($depot)) {
            $this->depots[] = $depot;
            $depot->setCompte($this);
        }

        return $this;
    }

    public function removeDepot(Depot $depot): self
    {
        if ($this->depots->contains($depot)) {
            $this->depots->removeElement($depot);
            // set the owning side to null (unless already changed)
            if ($depot->getCompte() === $this) {
                $depot->setCompte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setCompte($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->contains($transaction)) {
            $this->transactions->removeElement($transaction);
            // set the owning side to null (unless already changed)
            if ($transaction->getCompte() === $this) {
                $transaction->setCompte(null);
            }
        }

        return $this;
    }

    

    
    
}
