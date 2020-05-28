<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $department;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="decimal", precision=1, scale=0)
     */
    private $note;

    /**
     * @ORM\Column(type="integer")
     */
    private $minGuest;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxGuest;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity=Company::class, inversedBy="service", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

    /**
     * @ORM\OneToOne(targetEntity=Media::class, mappedBy="service", cascade={"persist", "remove"})
     */
    private $media;

    /**
     * @ORM\ManyToOne(targetEntity=ServiceList::class, inversedBy="services")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ServiceList;

    /**
     * @Groups("services")
     */
    public function getId(): ?int
    {
        return $this->id;
    }

     /**
     * @Groups("services")
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(string $department): self
    {
        $this->department = $department;

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getMinGuest(): ?int
    {
        return $this->minGuest;
    }

    public function setMinGuest(int $minGuest): self
    {
        $this->minGuest = $minGuest;

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getMaxGuest(): ?int
    {
        return $this->maxGuest;
    }

    public function setMaxGuest(int $maxGuest): self
    {
        $this->maxGuest = $maxGuest;

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): self
    {
        $this->company = $company;

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(?Media $media): self
    {
        $this->media = $media;

        // set (or unset) the owning side of the relation if necessary
        $newService = null === $media ? null : $this;
        if ($media->getService() !== $newService) {
            $media->setService($newService);
        }

        return $this;
    }

     /**
     * @Groups("services")
     */
    public function getServiceList(): ?ServiceList
    {
        return $this->ServiceList;
    }

    public function setServiceList(?ServiceList $ServiceList): self
    {
        $this->ServiceList = $ServiceList;

        return $this;
    }
}
