<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserEdit;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\Session;
/**
 * @Route("/settings/users")
 */
class UserController extends Controller
{   private $session;
    public function __construct()
    {
        $this->session = new Session();
    }
    /**
     * @Route("/", name="user_index", methods="GET")
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', ['users' => $userRepository->findAll()]);
    }
    /**
     * @Route("/{id}", name="user_show", methods="GET")
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', ['user' => $user]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods="GET|POST")
     */
    public function editUser(Request $request, User $user, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // 3) Encode the password (you could also do this via Doctrine listener)
        $form = $this->createForm(UserEdit::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $message = "The user has been updated.";
            $this->session->getFlashBag()->add("status", $message);
            return $this->redirectToRoute('user_edit', ['id' => $user->getId()]);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods="DELETE")
     */
    public function delete(Request $request, User $user): Response
    {
        $master = 1;
        if($user->getId() > $master){
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token')))
                {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
                $message = "The user has been deleted.";
                $this->session->getFlashBag()->add("status", $message);
                return $this->redirectToRoute('user_index');
                }

                }
        else{
            $message = "The master user cannot be removed.";
            $this->session->getFlashBag()->add("status", $message);
            return $this->redirectToRoute('user_index');
            }
            }
}
