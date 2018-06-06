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

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class ResetPasswordController extends Controller
{
    /**
     * @Route("/my/password", name="reset_password")
     */
    public function MyProfile(UserRepository $userRepository): Response
    {
        return $this->render('reset_password/index.html.twig', ['users' => $userRepository->findAll()]);
    }
    /**
     * @Route("/my/password/{id}", name="edit_password", methods="GET|POST")
     * @ParamConverter("id", class="App:User")
     * @Security("'id' != null")
     */
    public function editUser(Request $request, User $user, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // 3) Encode the password (you could also do this via Doctrine listener)
        $form = $this->createForm(ResetPasswordType::class, $user);
        $form->handleRequest($request);
        $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
        $user->setPassword($password);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('edit_password', ['username' => $user->getUsername()]);
        }

        return $this->render('reset_password/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}
