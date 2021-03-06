<?php

namespace App\Controller;

use App\Entity\Corporation;
use App\Entity\User;
use App\Form\CorporationType;
use App\Repository\CorporationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/corporation")
 */
class CorporationController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/", name="corporation_index", methods={"GET"})
     */
    public function index(CorporationRepository $corporationRepository): Response
    {
        return $this->render('corporation/index.html.twig', [
            'corporations' => $corporationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="corporation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $corporation = new Corporation();
        $form = $this->createForm(CorporationType::class, $corporation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $newUser = new User();
            $newUser->setEmail($corporation->getEmailOfContactPerson());
            $newUser->setPassword($this->passwordEncoder->encodePassword($newUser,'123pa$$worD'));
            $newUser->setLastname('lastname');
            $newUser->setFirstname('firstname');
            $newUser->setIsActive(1);
            $newUser->setBirthDate(\DateTime::createFromFormat('Y-m-d', $corporation->getDateRegistered()->format('Y-m-d')));
            $newUser->setRoles(['ROLE_COMPANY']);
            $entityManager->persist($newUser);

            $corporation->setIsActive(1);
            $corporation->setUser($newUser);

            $entityManager->persist($corporation);
            $entityManager->flush();

            return $this->redirectToRoute('corporation_index');
        }

        return $this->render('corporation/new.html.twig', [
            'corporation' => $corporation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="corporation_show", methods={"GET"})
     */
    public function show(Corporation $corporation): Response
    {
        return $this->render('corporation/show.html.twig', [
            'corporation' => $corporation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="corporation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Corporation $corporation): Response
    {
        $form = $this->createForm(CorporationType::class, $corporation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('corporation_index', [
                'id' => $corporation->getId(),
            ]);
        }

        return $this->render('corporation/edit.html.twig', [
            'corporation' => $corporation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="corporation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Corporation $corporation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$corporation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($corporation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('corporation_index');
    }
}
