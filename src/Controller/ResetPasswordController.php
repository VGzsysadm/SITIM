<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ResetPasswordType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class ResetPasswordController extends Controller
{
    private $session;
    public function __construct()
    {
        $this->session = new Session();
    }
    /**
     * @Route("/my/password", name="reset_password")
     */
    public function MyProfile(UserRepository $userRepository): Response
    {
        return $this->render('reset_password/index.html.twig', ['users' => $userRepository->findAll()]);
    }
    /**
     * @Route("/my/password/{id}", name="edit_password",methods="GET|POST")
     * @ParamConverter("id", class="App:User")
     * @Security("user.getId() == editUser.getId()")
     */
    public function editUser(Request $request, User $editUser, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $editUser = $this->getUser();
        $form = $this->createForm(ResetPasswordType::class, $editUser);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($editUser, $editUser->getPlainPassword());
            $editUser->setPassword($password);

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($editUser);
            $entityManager->flush();
            $message = "The password has been updated.";
            $this->session->getFlashBag()->add("status", $message);
            }
        return $this->render('reset_password/edit.html.twig', [
            'user' => $editUser,
            'form' => $form->createView(),
        ]);
    }
}
