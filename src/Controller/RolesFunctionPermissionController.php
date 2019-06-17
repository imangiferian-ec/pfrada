<?php

namespace App\Controller;

use App\Entity\RolesFunctionPermission;
use App\Form\RolesFunctionPermissionType;
use App\Repository\RolesFunctionPermissionRepository;
use App\Repository\SystemModuleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\GetDataService;
use App\Entity\SystemModule;
use App\Entity\Role;

/**
 * @Route("/roles/function/permission")
 */
class RolesFunctionPermissionController extends AbstractController
{
    /**
     * @Route("/modify-all", name="modify_all_pl", methods={"GET","POST"})
     */

    public function modifyAll(GetDataService $getDataService, RolesFunctionPermissionRepository $permissionListRepository): Response
    {
      if(!$this->isGranted('modify_all_pl')){
        throw $this->createAccessDeniedException("You do not have access permission");
      }

        $entityManager = $this->getDoctrine()->getManager();

        $roles = $getDataService->fetch(Role::class);
        $roleFinal = [];
        foreach($roles as $role)
        {
          $roleFinal[] = $role->getName();
        }

        if($_POST)
        {
          $functions = [];
          foreach($_POST['permittedRole'] as $permittedRole => $value)
          {
             $functions[$permittedRole] = $entityManager->getRepository(RolesFunctionPermission::class)->find($permittedRole);
             $functions[$permittedRole]->setPermittedRoles($value);
          }

           $entityManager->flush();


          return $this->redirectToRoute('roles_function_permission_index');
        }

        $data['roles'] = $roleFinal;
        $data['systemModules'] = $getDataService->fetch(SystemModule::class);

        $data['permission_lists'] = $permissionListRepository->findAll();
        return $this->render('roles_function_permission/modifyAll.html.twig', $data);
    }

    /**
     * @Route("/", name="roles_function_permission_index", methods={"GET"})
     */
    public function index(RolesFunctionPermissionRepository $rolesFunctionPermissionRepository): Response
    {
      if(!$this->isGranted('roles_function_permission_index')){
        throw $this->createAccessDeniedException("You do not have access permission");
      }

        return $this->render('roles_function_permission/index.html.twig', [
            'roles_function_permissions' => $rolesFunctionPermissionRepository->findAll(),
        ]);
    }


    /**
     * @Route("/{id}", name="roles_function_permission_show", methods={"GET"})
     */
    public function show(RolesFunctionPermission $rolesFunctionPermission): Response
    {
      if(!$this->isGranted('roles_function_permission_show')){
        throw $this->createAccessDeniedException("You do not have access permission");
      }

        return $this->render('roles_function_permission/show.html.twig', [
            'roles_function_permission' => $rolesFunctionPermission,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="roles_function_permission_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RolesFunctionPermission $rolesFunctionPermission): Response
    {
      if(!$this->isGranted('roles_function_permission_edit')){
        throw $this->createAccessDeniedException("You do not have access permission");
      }

        $form = $this->createForm(RolesFunctionPermissionType::class, $rolesFunctionPermission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $permittedRoles = $form->get('permittedRoles')->getData();

            $finalPermittedRoles = [];
            foreach($permittedRoles as $permittedRole)
            {
              $finalPermittedRoles[] = $permittedRole->getName();
            }
            $rolesFunctionPermission->setPermittedRoles($finalPermittedRoles);

            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('roles_function_permission_index', [
                'id' => $rolesFunctionPermission->getId(),
            ]);
        }

        return $this->render('roles_function_permission/edit.html.twig', [
            'roles_function_permission' => $rolesFunctionPermission,
            'form' => $form->createView(),
        ]);
    }
}
