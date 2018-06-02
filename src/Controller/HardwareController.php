<?php

namespace App\Controller;

use App\Entity\Hardware;
use App\Form\HardwareType;
use App\Repository\HardwareRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hardware")
 */
class HardwareController extends Controller
{
    /**
     * @Route("/", name="hardware_index", methods="GET")
     */
    public function index(HardwareRepository $hardwareRepository): Response
    {
        return $this->render('hardware/index.html.twig', ['hardwares' => $hardwareRepository->findAll()]);
    }

    /**
     * @Route("/new", name="hardware_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $hardware = new Hardware();
        $form = $this->createForm(HardwareType::class, $hardware);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hardware);
            $em->flush();

            return $this->redirectToRoute('hardware_index');
        }

        return $this->render('hardware/new.html.twig', [
            'hardware' => $hardware,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hardware_show", methods="GET")
     */
    public function show(Hardware $hardware): Response
    {
        return $this->render('hardware/show.html.twig', ['hardware' => $hardware]);
    }

    /**
     * @Route("/{id}/edit", name="hardware_edit", methods="GET|POST")
     */
    public function edit(Request $request, Hardware $hardware): Response
    {
        $form = $this->createForm(HardwareType::class, $hardware);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hardware_edit', ['id' => $hardware->getId()]);
        }

        return $this->render('hardware/edit.html.twig', [
            'hardware' => $hardware,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hardware_delete", methods="DELETE")
     */
    public function delete(Request $request, Hardware $hardware): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hardware->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($hardware);
            $em->flush();
        }

        return $this->redirectToRoute('hardware_index');
    }
}
