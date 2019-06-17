<?php

namespace App\Controller;

use App\Entity\ClearanceFee;
use App\Form\ClearanceFeeType;
use App\Repository\ClearanceFeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/clearance/fee")
 */
class ClearanceFeeController extends AbstractController
{
    /**
     * @Route("/", name="clearance_fee_index", methods={"GET"})
     */
    public function index(ClearanceFeeRepository $clearanceFeeRepository): Response
    {
        return $this->render('clearance_fee/index.html.twig', [
            'clearance_fees' => $clearanceFeeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="clearance_fee_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $clearanceFee = new ClearanceFee();
        $form = $this->createForm(ClearanceFeeType::class, $clearanceFee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $clearanceFee->setIsActive(1);
            $entityManager->persist($clearanceFee);
            $entityManager->flush();

            return $this->redirectToRoute('clearance_fee_index');
        }

        return $this->render('clearance_fee/new.html.twig', [
            'clearance_fee' => $clearanceFee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="clearance_fee_show", methods={"GET"})
     */
    public function show(ClearanceFee $clearanceFee): Response
    {
        return $this->render('clearance_fee/show.html.twig', [
            'clearance_fee' => $clearanceFee,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="clearance_fee_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ClearanceFee $clearanceFee): Response
    {
        $form = $this->createForm(ClearanceFeeType::class, $clearanceFee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clearance_fee_index', [
                'id' => $clearanceFee->getId(),
            ]);
        }

        return $this->render('clearance_fee/edit.html.twig', [
            'clearance_fee' => $clearanceFee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="clearance_fee_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ClearanceFee $clearanceFee): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clearanceFee->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($clearanceFee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('clearance_fee_index');
    }
}
