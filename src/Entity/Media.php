<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediaRepository::class)
 */
class Media
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Chemin;

    /**
     * @ORM\OneToOne(targetEntity=Service::class, inversedBy="media", cascade={"persist", "remove"})
     */
    private $Service_id;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getChemin(): ?string
    {
        return $this->Chemin;
    }

    public function setChemin(?string $Chemin): self
    {
        $this->Chemin = $Chemin;

        return $this;
    }

    public function getServiceId(): ?Service
    {
        return $this->Service_id;
    }

    public function setServiceId(?Service $Service_id): self
    {
        $this->Service_id = $Service_id;

        return $this;
    }
}
