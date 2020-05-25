<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
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
    private $Raison_sociale;

    /**
     * @ORM\Column(type="integer")
     */
    private $Siret;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $UpdatedAt;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="entreprise", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $User_id;

    /**
     * @ORM\OneToOne(targetEntity=Service::class, mappedBy="Entreprise_id", cascade={"persist", "remove"})
     */
    private $service;

    /**
     * @ORM\OneToOne(targetEntity=Message::class, mappedBy="Entreprise_id", cascade={"persist", "remove"})
     */
    private $message;

    /**
     * @ORM\OneToOne(targetEntity=Favori::class, mappedBy="Entreprise_id", cascade={"persist", "remove"})
     */
    private $favori;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->Raison_sociale;
    }

    public function setRaisonSociale(string $Raison_sociale): self
    {
        $this->Raison_sociale = $Raison_sociale;

        return $this;
    }

    public function getSiret(): ?int
    {
        return $this->Siret;
    }

    public function setSiret(int $Siret): self
    {
        $this->Siret = $Siret;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

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

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(Service $service): self
    {
        $this->service = $service;

        // set the owning side of the relation if necessary
        if ($service->getEntrepriseId() !== $this) {
            $service->setEntrepriseId($this);
        }

        return $this;
    }

    public function getMessage(): ?Message
    {
        return $this->message;
    }

    public function setMessage(Message $message): self
    {
        $this->message = $message;

        // set the owning side of the relation if necessary
        if ($message->getEntrepriseId() !== $this) {
            $message->setEntrepriseId($this);
        }

        return $this;
    }

    public function getFavori(): ?Favori
    {
        return $this->favori;
    }

    public function setFavori(?Favori $favori): self
    {
        $this->favori = $favori;

        // set (or unset) the owning side of the relation if necessary
        $newEntreprise_id = null === $favori ? null : $this;
        if ($favori->getEntrepriseId() !== $newEntreprise_id) {
            $favori->setEntrepriseId($newEntreprise_id);
        }

        return $this;
    }
}
