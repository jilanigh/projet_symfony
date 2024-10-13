<?php

namespace App\Controller;

use App\Entity\Chauffeur;
use App\Entity\Personne;
use App\Form\RegistrationUsersFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register-chauffeur', name: 'app_register_chauffeur')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $chauffeur = new Chauffeur();
        $form = $this->createForm(RegistrationUsersFormType::class, $chauffeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            // encode the plain password
            $chauffeur->setPassword($userPasswordHasher->hashPassword($chauffeur, $plainPassword));

            $entityManager->persist($chauffeur);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('homepage');
        }

        return $this->render('registration/registerChauffeur.html.twig', [
            'registrationChauffeurForm' => $form,
        ]);
    }
}
