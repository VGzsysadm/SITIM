<?php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class RegistrationController extends Controller
{
    private $session;
    public function __construct()
    {
        $this->session = new Session();
    }

    /**
     * @Route("/register", name="user_registration")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            if ($entityManager != null){
                $message = "Your user has been registered although must be activated by an admin.";
            $this->session->getFlashBag()->add("status", $message);
            return $this->redirectToRoute('login');
        }
        }

        return $this->render(
            'registration/index.html.twig',
            array('form' => $form->createView())
        );
    }
}
