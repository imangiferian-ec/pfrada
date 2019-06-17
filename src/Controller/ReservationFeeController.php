<?php

namespace App\Controller;

use App\Entity\ReservationFee;
use App\Form\ReservationFeeType;
use App\Repository\ReservationFeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reservation/fee")
 */
class ReservationFeeController extends AbstractController
{
    /**
     * @Route("/", name="reservation_fee_index", methods={"GET"})
     */
    public function index(ReservationFeeRepository $reservationFeeRepository): Response
    {
        return $this->render('reservation_fee/index.html.twig', [
            'reservation_fees' => $reservationFeeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reservation_fee_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reservationFee = new ReservationFee();
        $form = $this->createForm(ReservationFeeType::class, $reservationFee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $reservationFee->setIsActive(1);

            $entityManager->persist($reservationFee);
            $entityManager->flush();

            return $this->redirectToRoute('reservation_fee_index');
        }

        return $this->render('reservation_fee/new.html.twig', [
            'reservation_fee' => $reservationFee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservation_fee_show", methods={"GET"})
     */
    public function show(ReservationFee $reservationFee): Response
    {
        return $this->render('reservation_fee/show.html.twig', [
            'reservation_fee' => $reservationFee,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reservation_fee_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ReservationFee $reservationFee): Response
    {
        $form = $this->createForm(ReservationFeeType::class, $reservationFee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservation_fee_index', [
                'id' => $reservationFee->getId(),
            ]);
        }

        return $this->render('reservation_fee/edit.html.twig', [
            'reservation_fee' => $reservationFee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservation_fee_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ReservationFee $reservationFee): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservationFee->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reservationFee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reservation_fee_index');
    }
}
