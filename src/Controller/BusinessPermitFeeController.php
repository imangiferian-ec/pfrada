<?php

namespace App\Controller;

use App\Entity\BusinessPermitFee;
use App\Form\BusinessPermitFeeType;
use App\Repository\BusinessPermitFeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/business/permit/fee")
 */
class BusinessPermitFeeController extends AbstractController
{
    /**
     * @Route("/", name="business_permit_fee_index", methods={"GET"})
     */
    public function index(BusinessPermitFeeRepository $businessPermitFeeRepository): Response
    {
        return $this->render('business_permit_fee/index.html.twig', [
            'business_permit_fees' => $businessPermitFeeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="business_permit_fee_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $businessPermitFee = new BusinessPermitFee();
        $form = $this->createForm(BusinessPermitFeeType::class, $businessPermitFee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $businessPermitFee->setIsActive(1);

            $entityManager->persist($businessPermitFee);
            $entityManager->flush();

            return $this->redirectToRoute('business_permit_fee_index');
        }

        return $this->render('business_permit_fee/new.html.twig', [
            'business_permit_fee' => $businessPermitFee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="business_permit_fee_show", methods={"GET"})
     */
    public function show(BusinessPermitFee $businessPermitFee): Response
    {
        return $this->render('business_permit_fee/show.html.twig', [
            'business_permit_fee' => $businessPermitFee,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="business_permit_fee_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BusinessPermitFee $businessPermitFee): Response
    {
        $form = $this->createForm(BusinessPermitFeeType::class, $businessPermitFee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('business_permit_fee_index', [
                'id' => $businessPermitFee->getId(),
            ]);
        }

        return $this->render('business_permit_fee/edit.html.twig', [
            'business_permit_fee' => $businessPermitFee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="business_permit_fee_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BusinessPermitFee $businessPermitFee): Response
    {
        if ($this->isCsrfTokenValid('delete'.$businessPermitFee->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($businessPermitFee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('business_permit_fee_index');
    }
}
