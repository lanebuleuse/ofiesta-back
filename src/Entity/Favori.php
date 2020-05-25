<?php

namespace App\Entity;

use App\Repository\FavoriRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FavoriRepository::class)
 */
class Favori
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="favori", cascade={"persist", "remove"})
     */
    private $User_id;

    /**
     * @ORM\OneToOne(targetEntity=Entreprise::class, inversedBy="favori", cascade={"persist", "remove"})
     */
    private $Entreprise_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->User_id;
    }

    public function setUserId(?User $User_id): self
    {
        $this->User_id = $User_id;

        return $this;
    }

    public function getEntrepriseId(): ?Entreprise
    {
        return $this->Entreprise_id;
    }

    public function setEntrepriseId(?Entreprise $Entreprise_id): self
    {
        $this->Entreprise_id = $Entreprise_id;

        return $this;
    }
}
