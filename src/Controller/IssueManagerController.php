<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IssueManagerController extends AbstractController
{
    /**
     * @Route("/issues", name="issues_index", methods="GET")
     */
    public function index()
    {
        return $this->render('issue_manager/index.html.twig', [
            'controller_name' => 'IssueManagerController',
        ]);
    }
}
