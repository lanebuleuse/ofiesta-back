<?php

namespace App\Entity;

use App\Repository\ServiceListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ServiceListRepository::class)
 */
class ServiceList
{
    /**
     * @ORM\Id()
     * @Groups("services")
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"services", "company_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"services", "services_list", "company_read"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="ServiceList")
     */
    private $services;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->setServiceList($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->contains($service)) {
            $this->services->removeElement($service);
            // set the owning side to null (unless already changed)
            if ($service->getServiceList() === $this) {
                $service->setServiceList(null);
            }
        }

        return $this;
    }    
}