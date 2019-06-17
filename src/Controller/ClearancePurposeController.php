<?php

namespace App\Controller;

use App\Entity\ClearancePurpose;
use App\Form\ClearancePurposeType;
use App\Repository\ClearancePurposeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/clearance/purpose")
 */
class ClearancePurposeController extends AbstractController
{
    /**
     * @Route("/", name="clearance_purpose_index", methods={"GET"})
     */
    public function index(ClearancePurposeRepository $clearancePurposeRepository): Response
    {
        return $this->render('clearance_purpose/index.html.twig', [
            'clearance_purposes' => $clearancePurposeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="clearance_purpose_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $clearancePurpose = new ClearancePurpose();
        $form = $this->createForm(ClearancePurposeType::class, $clearancePurpose);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $clearancePurpose->setIsActive(1);
            $entityManager->persist($clearancePurpose);
            $entityManager->flush();

            return $this->redirectToRoute('clearance_purpose_index');
        }

        return $this->render('clearance_purpose/new.html.twig', [
            'clearance_purpose' => $clearancePurpose,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="clearance_purpose_show", methods={"GET"})
     */
    public function show(ClearancePurpose $clearancePurpose): Response
    {
        return $this->render('clearance_purpose/show.html.twig', [
            'clearance_purpose' => $clearancePurpose,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="clearance_purpose_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ClearancePurpose $clearancePurpose): Response
    {
        $form = $this->createForm(ClearancePurposeType::class, $clearancePurpose);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clearance_purpose_index', [
                'id' => $clearancePurpose->getId(),
            ]);
        }

        return $this->render('clearance_purpose/edit.html.twig', [
            'clearance_purpose' => $clearancePurpose,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="clearance_purpose_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ClearancePurpose $clearancePurpose): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clearancePurpose->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($clearancePurpose);
            $entityManager->flush();
        }

        return $this->redirectToRoute('clearance_purpose_index');
    }
}
