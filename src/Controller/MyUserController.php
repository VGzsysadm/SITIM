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

class MyUserController extends Controller
{
    /**
     * @Route("/my/username/", name="my_user", methods="GET")
     */
    public function MyProfile(UserRepository $userRepository): Response
    {
        return $this->render('my_user/index.html.twig', ['users' => $userRepository->findAll()]);
    }

}
