<?php

namespace App\Entity;

use App\Repository\ServiceListRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceListRepository::class)
 */
class ServiceList
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
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Service::class, mappedBy="serviceList", cascade={"persist", "remove"})
     */
    private $service;

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

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        // set (or unset) the owning side of the relation if necessary
        $newServiceList = null === $service ? null : $this;
        if ($service->getServiceList() !== $newServiceList) {
            $service->setServiceList($newServiceList);
        }

        return $this;
    }

    
}