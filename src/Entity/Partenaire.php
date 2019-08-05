<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PartenaireRepository")
 */
class Partenaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $Prenom;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $Telephone;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $CNI;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $NINEA;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $RaisonSocial;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserPartenaire", mappedBy="partenaire", orphanRemoval=true)
     */
    private $UserPartenaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SuperAdmin", inversedBy="Partenaire")
     */
    private $superAdmin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $Email;

    public function __construct()
    {
        $this->UserPartenaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->Telephone;
    }

    public function setTelephone(int $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getCNI(): ?int
    {
        return $this->CNI;
    }

    public function setCNI(int $CNI): self
    {
        $this->CNI = $CNI;

        return $this;
    }

    public function getNINEA(): ?int
    {
        return $this->NINEA;
    }

    public function setNINEA(int $NINEA): self
    {
        $this->NINEA = $NINEA;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->RaisonSocial;
    }

    public function setRaisonSocial(string $RaisonSocial): self
    {
        $this->RaisonSocial = $RaisonSocial;

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
            $userPartenaire->setPartenaire($this);
        }

        return $this;
    }

    public function removeUserPartenaire(UserPartenaire $userPartenaire): self
    {
        if ($this->UserPartenaire->contains($userPartenaire)) {
            $this->UserPartenaire->removeElement($userPartenaire);
            // set the owning side to null (unless already changed)
            if ($userPartenaire->getPartenaire() === $this) {
                $userPartenaire->setPartenaire(null);
            }
        }

        return $this;
    }

    public function getSuperAdmin(): ?SuperAdmin
    {
        return $this->superAdmin;
    }

    public function setSuperAdmin(?SuperAdmin $superAdmin): self
    {
        $this->superAdmin = $superAdmin;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }
}
