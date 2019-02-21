<?php

namespace App\Controller;

use App\Entity\FluechtlingDaten;
use App\Form\FluechtlingDatenType;
use App\Repository\FluechtlingDatenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fluechtling/daten")
 */
class FluechtlingDatenController extends AbstractController
{
    /**
     * @Route("/", name="fluechtling_daten_index", methods="GET")
     */
    public function index(FluechtlingDatenRepository $fluechtlingDatenRepository): Response
    {
        return $this->render('fluechtling_daten/index.html.twig', ['fluechtling_datens' => $fluechtlingDatenRepository->findAll()]);
    }

    /**
     * @Route("/new", name="fluechtling_daten_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $fluechtlingDaten = new FluechtlingDaten();
        $form = $this->createForm(FluechtlingDatenType::class, $fluechtlingDaten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fluechtlingDaten);
            $em->flush();

            return $this->redirectToRoute('fluechtling_daten_index');
        }

        return $this->render('fluechtling_daten/new.html.twig', [
            'fluechtling_daten' => $fluechtlingDaten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fluechtling_daten_show", methods="GET")
     */
    public function show(FluechtlingDaten $fluechtlingDaten): Response
    {
        return $this->render('fluechtling_daten/show.html.twig', ['fluechtling_daten' => $fluechtlingDaten]);
    }

    /**
     * @Route("/{id}/edit", name="fluechtling_daten_edit", methods="GET|POST")
     */
    public function edit(Request $request, FluechtlingDaten $fluechtlingDaten): Response
    {
        $form = $this->createForm(FluechtlingDatenType::class, $fluechtlingDaten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fluechtling_daten_edit', ['id' => $fluechtlingDaten->getId()]);
        }

        return $this->render('fluechtling_daten/edit.html.twig', [
            'fluechtling_daten' => $fluechtlingDaten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fluechtling_daten_delete", methods="DELETE")
     */
    public function delete(Request $request, FluechtlingDaten $fluechtlingDaten): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fluechtlingDaten->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fluechtlingDaten);
            $em->flush();
        }

        return $this->redirectToRoute('fluechtling_daten_index');
    }
}
