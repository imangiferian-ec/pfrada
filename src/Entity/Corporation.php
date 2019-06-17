<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="corporations")
 * @ORM\Entity(repositoryClass="App\Repository\CorporationRepository")
 */
class Corporation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $businessName;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRegistered;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $birNo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tinNo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $philgeps;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ownerName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactPersonName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailOfContactPerson;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactNo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BusinessType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $businessType;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBusinessName(): ?string
    {
        return $this->businessName;
    }

    public function setBusinessName(string $businessName): self
    {
        $this->businessName = $businessName;

        return $this;
    }

    public function getDateRegistered(): ?\DateTimeInterface
    {
        return $this->dateRegistered;
    }

    public function setDateRegistered(\DateTimeInterface $dateRegistered): self
    {
        $this->dateRegistered = $dateRegistered;

        return $this;
    }

    public function getBirNo(): ?string
    {
        return $this->birNo;
    }

    public function setBirNo(string $birNo): self
    {
        $this->birNo = $birNo;

        return $this;
    }

    public function getTinNo(): ?string
    {
        return $this->tinNo;
    }

    public function setTinNo(string $tinNo): self
    {
        $this->tinNo = $tinNo;

        return $this;
    }

    public function getPhilgeps(): ?string
    {
        return $this->philgeps;
    }

    public function setPhilgeps(?string $philgeps): self
    {
        $this->philgeps = $philgeps;

        return $this;
    }

    public function getOwnerName(): ?string
    {
        return $this->ownerName;
    }

    public function setOwnerName(string $ownerName): self
    {
        $this->ownerName = $ownerName;

        return $this;
    }

    public function getContactPersonName(): ?string
    {
        return $this->contactPersonName;
    }

    public function setContactPersonName(string $contactPersonName): self
    {
        $this->contactPersonName = $contactPersonName;

        return $this;
    }

    public function getEmailOfContactPerson(): ?string
    {
        return $this->emailOfContactPerson;
    }

    public function setEmailOfContactPerson(string $emailOfContactPerson): self
    {
        $this->emailOfContactPerson = $emailOfContactPerson;

        return $this;
    }

    public function getContactNo(): ?string
    {
        return $this->contactNo;
    }

    public function setContactNo(string $contactNo): self
    {
        $this->contactNo = $contactNo;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getBusinessType(): ?BusinessType
    {
        return $this->businessType;
    }

    public function setBusinessType(?BusinessType $businessType): self
    {
        $this->businessType = $businessType;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
