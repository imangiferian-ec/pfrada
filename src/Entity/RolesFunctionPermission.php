<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="roles_function_permissions")
 * @ORM\Entity(repositoryClass="App\Repository\RolesFunctionPermissionRepository")
 */
class RolesFunctionPermission
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SystemModule", inversedBy="rolesFunctionPermissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $module;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $functionName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $route;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="json_array")
     */
    private $permittedRoles;

    /**
     * @ORM\Column(type="smallint")
     */
    private $position;

    /**
     * @ORM\Column(type="boolean", options={"default" : 1})
     */
    private $isActive;

    /**
     * @ORM\Column(type="boolean", options={"default" : 0})
     */
    private $isSideMenu;

    public function getId()
    {
        return $this->id;
    }

    public function getModule(): ?SystemModule
    {
        return $this->module;
    }

    public function setModule(?SystemModule $module): self
    {
        $this->module = $module;

        return $this;
    }

    public function getFunctionName(): ?string
    {
        return $this->functionName;
    }

    public function setFunctionName(string $functionName): self
    {
        $this->functionName = $functionName;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(string $route): self
    {
        $this->route = $route;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getPermittedRoles()
    {
        return $this->permittedRoles;
    }

    public function setPermittedRoles($permittedRoles): self
    {
        $this->permittedRoles = $permittedRoles;

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

    public function getIsSideMenu(): ?bool
    {
        return $this->isSideMenu;
    }

    public function setIsSideMenu(bool $isSideMenu): self
    {
        $this->isSideMenu = $isSideMenu;

        return $this;
    }
}
