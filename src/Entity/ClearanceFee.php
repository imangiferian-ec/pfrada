<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="clearance_fees")
 * @ORM\Entity(repositoryClass="App\Repository\ClearanceFeeRepository")
 */
class ClearanceFee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ClearancePurpose")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clearancePurpose;

    /**
     * @ORM\Column(type="float", options={"default":0.0})
     */
    private $voterFeeAmount;

    /**
     * @ORM\Column(type="float", options={"default":0.0})
     */
    private $nonVoterFeeAmount;

    /**
     * @ORM\Column(type="boolean", options={"default":1})
     */
    private $isActive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClearancePurpose(): ?ClearancePurpose
    {
        return $this->clearancePurpose;
    }

    public function setClearancePurpose(?ClearancePurpose $clearancePurpose): self
    {
        $this->clearancePurpose = $clearancePurpose;

        return $this;
    }

    public function getVoterFeeAmount(): ?float
    {
        return $this->voterFeeAmount;
    }

    public function setVoterFeeAmount(float $voterFeeAmount): self
    {
        $this->voterFeeAmount = $voterFeeAmount;

        return $this;
    }

    public function getNonVoterFeeAmount(): ?float
    {
        return $this->nonVoterFeeAmount;
    }

    public function setNonVoterFeeAmount(float $nonVoterFeeAmount): self
    {
        $this->nonVoterFeeAmount = $nonVoterFeeAmount;

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
