<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="system_modules")
 * @ORM\Entity(repositoryClass="App\Repository\SystemModuleRepository")
 */
class SystemModule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $moduleName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="json_array")
     */
    private $allowedRoles;

    /**
     * @ORM\Column(type="smallint")
     */
    private $position;

    /**
     * @ORM\Column(type="boolean", options={"default" : 1})
     */
    private $isActive;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RolesFunctionPermission", mappedBy="module")
     */
    private $rolesFunctionPermissions;

    public function __construct()
    {
        $this->rolesFunctionPermissions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModuleName(): ?string
    {
        return $this->moduleName;
    }

    public function setModuleName(string $moduleName): self
    {
        $this->moduleName = $moduleName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAllowedRoles()
    {
        return $this->allowedRoles;
    }

    public function setAllowedRoles($allowedRoles): self
    {
        $this->allowedRoles = $allowedRoles;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

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

    /**
     * @return Collection|RolesFunctionPermission[]
     */
    public function getRolesFunctionPermissions(): Collection
    {
        return $this->rolesFunctionPermissions;
    }

    public function addRolesFunctionPermission(RolesFunctionPermission $rolesFunctionPermission): self
    {
        if (!$this->rolesFunctionPermissions->contains($rolesFunctionPermission)) {
            $this->rolesFunctionPermissions[] = $rolesFunctionPermission;
            $rolesFunctionPermission->setModule($this);
        }

        return $this;
    }

    public function removeRolesFunctionPermission(RolesFunctionPermission $rolesFunctionPermission): self
    {
        if ($this->rolesFunctionPermissions->contains($rolesFunctionPermission)) {
            $this->rolesFunctionPermissions->removeElement($rolesFunctionPermission);
            // set the owning side to null (unless already changed)
            if ($rolesFunctionPermission->getModule() === $this) {
                $rolesFunctionPermission->setModule(null);
            }
        }

        return $this;
    }

    public function __toString(){
      return $this->moduleName;
    }
}
