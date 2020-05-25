<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
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
    private $Adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $CP;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Ville;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Departement;

    /**
     * @ORM\Column(type="integer")
     */
    private $Prix;

    /**
     * @ORM\Column(type="decimal", precision=1, scale=0)
     */
    private $Note;

    /**
     * @ORM\Column(type="integer")
     */
    private $MinInvite;

    /**
     * @ORM\Column(type="integer")
     */
    private $MaxInvite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $UpdatedAt;

    /**
     * @ORM\OneToOne(targetEntity=Entreprise::class, inversedBy="service", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Entreprise_id;

    /**
     * @ORM\OneToOne(targetEntity=ListePrestation::class, inversedBy="service", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ListePrestation_id;

    /**
     * @ORM\OneToOne(targetEntity=Media::class, mappedBy="Service_id", cascade={"persist", "remove"})
     */
    private $media;

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

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCP(): ?int
    {
        return $this->CP;
    }

    public function setCP(int $CP): self
    {
        $this->CP = $CP;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->Departement;
    }

    public function setDepartement(string $Departement): self
    {
        $this->Departement = $Departement;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->Note;
    }

    public function setNote(string $Note): self
    {
        $this->Note = $Note;

        return $this;
    }

    public function getMinInvite(): ?int
    {
        return $this->MinInvite;
    }

    public function setMinInvite(int $MinInvite): self
    {
        $this->MinInvite = $MinInvite;

        return $this;
    }

    public function getMaxInvite(): ?int
    {
        return $this->MaxInvite;
    }

    public function setMaxInvite(int $MaxInvite): self
    {
        $this->MaxInvite = $MaxInvite;

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

    public function getEntrepriseId(): ?Entreprise
    {
        return $this->Entreprise_id;
    }

    public function setEntrepriseId(Entreprise $Entreprise_id): self
    {
        $this->Entreprise_id = $Entreprise_id;

        return $this;
    }

    public function getListePrestationId(): ?ListePrestation
    {
        return $this->ListePrestation_id;
    }

    public function setListePrestationId(ListePrestation $ListePrestation_id): self
    {
        $this->ListePrestation_id = $ListePrestation_id;

        return $this;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(?Media $media): self
    {
        $this->media = $media;

        // set (or unset) the owning side of the relation if necessary
        $newService_id = null === $media ? null : $this;
        if ($media->getServiceId() !== $newService_id) {
            $media->setServiceId($newService_id);
        }

        return $this;
    }
}
