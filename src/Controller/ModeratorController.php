<?php
// src/Controller/ModeratorController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class ModeratorController extends AbstractController
{
    /**
     * @Route("/register_moderator", name="register_moderator")
     */
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $password = $request->request->get('password');

            // Check if the user already exists
            $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
            if ($existingUser) {
                return new Response('User with this email already exists.');
            }

            // Create new user
            $user = new User();
            $user->setEmail($email);
            $user->setRoles(['ROLE_MODERATOR']);
            $user->setPassword(
                $passwordHasher->hashPassword($user, $password)
            );

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('register_moderator_success');
        }

        return $this->render('admin/register.html.twig');
    }

    /**
     * @Route("/register_moderator/success", name="register_moderator_success")
     */
    public function success(): Response
    {
        return new Response('Moderator successfully registered!');
    }
}
