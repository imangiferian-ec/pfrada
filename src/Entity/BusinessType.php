<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="business_types")
 * @ORM\Entity(repositoryClass="App\Repository\BusinessTypeRepository")
 */
class BusinessType
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
    private $businessTypeName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $businessTypeDescription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBusinessTypeName(): ?string
    {
        return $this->businessTypeName;
    }

    public function setBusinessTypeName(string $businessTypeName): self
    {
        $this->businessTypeName = $businessTypeName;

        return $this;
    }

    public function getBusinessTypeDescription(): ?string
    {
        return $this->businessTypeDescription;
    }

    public function setBusinessTypeDescription(?string $businessTypeDescription): self
    {
        $this->businessTypeDescription = $businessTypeDescription;

        return $this;
    }

    public function __toString(){
      return $this->businessTypeName;
    }
}
