<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Type;

    /**
     * @ORM\Column(type="date")
     */
    private $DateTransaction;

    /**
     * @ORM\Column(type="integer")
     */
    private $Montant;

    /**
     * @ORM\Column(type="integer" ,nullable=true)
     */
    private $NumeroExpediteur;

   

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NumeroDestinataire;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CNIdestinataire;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $NomCompletExpediteur;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $NomCompletDestinataire;

    /**
     * @ORM\Column(type="string")
     */
    private $CodeTransaction;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compte", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Compte;

    /**
     * @ORM\Column(type="integer")
     */
    private $Frais;

    /**
     * @ORM\Column(type="integer")
     */
    private $CommissionEtat;

    /**
     * @ORM\Column(type="integer")
     */
    private $CommissionSystem;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CommissionPartenaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getDateTransaction(): ?\DateTimeInterface
    {
        return $this->DateTransaction;
    }

    public function setDateTransaction(\DateTimeInterface $DateTransaction): self
    {
        $this->DateTransaction = $DateTransaction;

        return $this;
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

    public function getNumeroExpediteur(): ?int
    {
        return $this->NumeroExpediteur;
    }

    public function setNumeroExpediteur(int $NumeroExpediteur): self
    {
        $this->NumeroExpediteur = $NumeroExpediteur;

        return $this;
    }


    public function getNumeroDestinataire(): ?int
    {
        return $this->NumeroDestinataire;
    }

    public function setNumeroDestinataire(int $NumeroDestinataire): self
    {
        $this->NumeroDestinataire = $NumeroDestinataire;

        return $this;
    }

    public function getCNIdestinataire(): ?int
    {
        return $this->CNIdestinataire;
    }

    public function setCNIdestinataire(int $CNIdestinataire): self
    {
        $this->CNIdestinataire = $CNIdestinataire;

        return $this;
    }

    public function getNomCompletExpediteur(): ?string
    {
        return $this->NomCompletExpediteur;
    }

    public function setNomCompletExpediteur(string $NomCompletExpediteur): self
    {
        $this->NomCompletExpediteur = $NomCompletExpediteur;

        return $this;
    }

    public function getNomCompletDestinataire(): ?string
    {
        return $this->NomCompletDestinataire;
    }

    public function setNomCompletDestinataire(string $NomCompletDestinataire): self
    {
        $this->NomCompletDestinataire = $NomCompletDestinataire;

        return $this;
    }

    public function getCodeTransaction(): ?string
    {
        return $this->CodeTransaction;
    }

    public function setCodeTransaction(string $CodeTransaction): self
    {
        $this->CodeTransaction = $CodeTransaction;

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

    public function getFrais(): ?int
    {
        return $this->Frais;
    }

    public function setFrais(int $Frais): self
    {
        $this->Frais = $Frais;

        return $this;
    }

    public function getCommissionEtat(): ?int
    {
        return $this->CommissionEtat;
    }

    public function setCommissionEtat(int $CommissionEtat): self
    {
        $this->CommissionEtat = $CommissionEtat;

        return $this;
    }

    public function getCommissionSystem(): ?int
    {
        return $this->CommissionSystem;
    }

    public function setCommissionSystem(int $CommissionSystem): self
    {
        $this->CommissionSystem = $CommissionSystem;

        return $this;
    }

    public function getCommissionPartenaire(): ?int
    {
        return $this->CommissionPartenaire;
    }

    public function setCommissionPartenaire(int $CommissionPartenaire): self
    {
        $this->CommissionPartenaire = $CommissionPartenaire;

        return $this;
    }
}
