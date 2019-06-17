<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="reservation_fees")
 * @ORM\Entity(repositoryClass="App\Repository\ReservationFeeRepository")
 */
class ReservationFee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Facility")
     * @ORM\JoinColumn(nullable=false)
     */
    private $facility;

    /**
     * @ORM\Column(type="float", options={"default":0.0})
     */
    private $feePerHour;

    /**
     * @ORM\Column(type="float", options={"default":0.0}, nullable=true)
     */
    private $maintenanceFee;

    /**
     * @ORM\Column(type="boolean", options={"default":1})
     */
    private $isActive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacility(): ?Facility
    {
        return $this->facility;
    }

    public function setFacility(?Facility $facility): self
    {
        $this->facility = $facility;

        return $this;
    }

    public function getFeePerHour(): ?float
    {
        return $this->feePerHour;
    }

    public function setFeePerHour(float $feePerHour): self
    {
        $this->feePerHour = $feePerHour;

        return $this;
    }

    public function getMaintenanceFee(): ?float
    {
        return $this->maintenanceFee;
    }

    public function setMaintenanceFee(?float $maintenanceFee): self
    {
        $this->maintenanceFee = $maintenanceFee;

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
