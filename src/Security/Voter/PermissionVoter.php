<?php

namespace App\Security\Voter;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Service\FunctionPermissionsService;

class PermissionVoter extends Voter
{

    private $functionsPermission;
    private $roles_permitted;

    public function __construct(FunctionPermissionsService $pcs)
    {
        $this->functionsPermission = $pcs;
    }

    protected function supports($attribute, $subject)
    {
        $permittedRoles = [];
        $allFuntions = $this->functionsPermission->getAllFunctionsPermittedRoles();

        foreach($allFuntions as $funtions){
            $permittedRoles[$funtions["route"]] = $funtions['permitted_roles'];
        }

        $this->roles_permitted = $permittedRoles;
        return array_key_exists($attribute, $this->roles_permitted);

    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
      $user = $token->getUser();

      $role = $user->getRoles();

      $strRole = implode($user->getRoles());

      $access = $this->roles_permitted[$attribute];


      if (!$user instanceof UserInterface) {
          return false;
      }

      if (strpos($access, $strRole ) !== false)
      {
        return true;
      }
      else
      {
        return false;
      }

      return false;
    }
}
