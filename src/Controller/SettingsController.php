<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SettingsController extends Controller
{
    /**
     * @Route("/settings", name="settings")
     */
    public function index()
    {
        return $this->render('settings/index.html.twig', [
            'controller_name' => 'SettingsController',
        ]);
    }
}
