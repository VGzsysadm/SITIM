<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StaticPagesController extends Controller
{
    /**
     * @Route("/privacy-policy", name="privacy_policy")
     */
    public function PrivacyPolicy()
    {
        return $this->render('static_pages/privacypolicy.html.twig', [
            'controller_name' => 'StaticPagesController',
        ]);
    }
    /**
     * @Route("/documentation", name="documentation")
     */
    public function Documentation()
    {
        return $this->render('static_pages/documentation.html.twig', [
            'controller_name' => 'StaticPagesController',
        ]);
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function Contact()
    {
        return $this->render('static_pages/contact.html.twig', [
            'controller_name' => 'StaticPagesController',
        ]);
    }
}
