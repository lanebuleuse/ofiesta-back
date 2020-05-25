<?php

namespace App\Entity;

use App\Repository\ListePrestationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListePrestationRepository::class)
 */
class ListePrestation
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
     * @ORM\OneToOne(targetEntity=Service::class, mappedBy="ListePrestation_id", cascade={"persist", "remove"})
     */
    private $service;

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

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(Service $service): self
    {
        $this->service = $service;

        // set the owning side of the relation if necessary
        if ($service->getListePrestationId() !== $this) {
            $service->setListePrestationId($this);
        }

        return $this;
    }
}
