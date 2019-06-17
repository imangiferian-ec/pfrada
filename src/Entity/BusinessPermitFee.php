<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="business_permit_fees")
 * @ORM\Entity(repositoryClass="App\Repository\BusinessPermitFeeRepository")
 */
class BusinessPermitFee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BusinessType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $businessType;

    /**
     * @ORM\Column(type="float", options={"default":0.0})
     */
    private $newApplicantCharge;

    /**
     * @ORM\Column(type="float", options={"default":0.0})
     */
    private $renewalApplicantCharge;

    /**
     * @ORM\Column(type="boolean", options={"default":1})
     */
    private $isForCitizen;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNewApplicantCharge(): ?float
    {
        return $this->newApplicantCharge;
    }

    public function setNewApplicantCharge(float $newApplicantCharge): self
    {
        $this->newApplicantCharge = $newApplicantCharge;

        return $this;
    }

    public function getRenewalApplicantCharge(): ?float
    {
        return $this->renewalApplicantCharge;
    }

    public function setRenewalApplicantCharge(float $renewalApplicantCharge): self
    {
        $this->renewalApplicantCharge = $renewalApplicantCharge;

        return $this;
    }

    public function getIsForCitizen(): ?bool
    {
        return $this->isForCitizen;
    }

    public function setIsForCitizen(bool $isForCitizen): self
    {
        $this->isForCitizen = $isForCitizen;

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
}
