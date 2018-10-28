<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfileEditType;
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
class MyUserController extends Controller
{   
    private $session;
    public function __construct()
    {
        $this->session = new Session();
    }
    /**
     * @Route("/profile/", name="profile", methods="GET")
     */
    public function MyProfile(UserRepository $userRepository): Response
    {
        return $this->render('profile/index.html.twig', ['users' => $userRepository->findAll()]);
    }
    /**
     * @Route("/profile/edit/{id}", name="profile_edit",methods="GET|POST")
     * @ParamConverter("id", class="App:User")
     * @Security("user.getId() == editUser.getId()")
     */
    public function editUser(Request $request, User $editUser): Response
    {
        $editUser = $this->getUser();
        $form = $this->createForm(ProfileEditType::class, $editUser);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($editUser);
            $entityManager->flush();
            $message = "The profile has been updated.";
            $this->session->getFlashBag()->add("status", $message);
            }
        return $this->render('profile/edit.html.twig', [
            'user' => $editUser,
            'form' => $form->createView(),
        ]);
    }

}