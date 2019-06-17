<?php

namespace App\Controller;

use App\Entity\Citizen;
use App\Form\CitizenType;
use App\Entity\User;
use App\Repository\CitizenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/citizen")
 */
class CitizenController extends AbstractController
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/", name="citizen_index", methods={"GET"})
     */
    public function index(CitizenRepository $citizenRepository): Response
    {
        
        return $this->render('citizen/index.html.twig', [
            'citizens' => $citizenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="citizen_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $citizen = new Citizen();
        $form = $this->createForm(CitizenType::class, $citizen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          //dump($citizen->getBirthDate()->format('Y-m-d'));
            $entityManager = $this->getDoctrine()->getManager();

            $newUser = new User();
            $newUser->setEmail($citizen->getEmail());
            $newUser->setPassword($this->passwordEncoder->encodePassword($newUser,'123'.$citizen->getLastname()));
            $newUser->setLastname($citizen->getLastname());
            $newUser->setFirstname($citizen->getFirstname());
            $newUser->setIsActive(1);
            $newUser->setBirthDate(\DateTime::createFromFormat('Y-m-d', $citizen->getBirthDate()->format('Y-m-d')));
            $newUser->setRoles(['ROLE_USER']);
            $entityManager->persist($newUser);

            $entityManager->persist($citizen);

            $citizen->setIsActive(1);
            $citizen->setUser($newUser);

            $entityManager->flush();

            return $this->redirectToRoute('citizen_index');
        }

        return $this->render('citizen/new.html.twig', [
            'citizen' => $citizen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="citizen_show", methods={"GET"})
     */
    public function show(Citizen $citizen): Response
    {
        return $this->render('citizen/show.html.twig', [
            'citizen' => $citizen,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="citizen_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Citizen $citizen): Response
    {
        $form = $this->createForm(CitizenType::class, $citizen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('citizen_index', [
                'id' => $citizen->getId(),
            ]);
        }

        return $this->render('citizen/edit.html.twig', [
            'citizen' => $citizen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="citizen_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Citizen $citizen): Response
    {
        if ($this->isCsrfTokenValid('delete'.$citizen->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($citizen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('citizen_index');
    }
}
