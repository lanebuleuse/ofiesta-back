<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
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
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Texte;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Nonlu;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Archiver;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $User_id;

    /**
     * @ORM\OneToOne(targetEntity=Entreprise::class, inversedBy="message", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Entreprise_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->Date;
    }

    public function setDate(string $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->Texte;
    }

    public function setTexte(string $Texte): self
    {
        $this->Texte = $Texte;

        return $this;
    }

    public function getNonlu(): ?bool
    {
        return $this->Nonlu;
    }

    public function setNonlu(bool $Nonlu): self
    {
        $this->Nonlu = $Nonlu;

        return $this;
    }

    public function getArchiver(): ?bool
    {
        return $this->Archiver;
    }

    public function setArchiver(bool $Archiver): self
    {
        $this->Archiver = $Archiver;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->User_id;
    }

    public function setUserId(User $User_id): self
    {
        $this->User_id = $User_id;

        return $this;
    }

    public function getEntrepriseId(): ?Entreprise
    {
        return $this->Entreprise_id;
    }

    public function setEntrepriseId(Entreprise $Entreprise_id): self
    {
        $this->Entreprise_id = $Entreprise_id;

        return $this;
    }
}
