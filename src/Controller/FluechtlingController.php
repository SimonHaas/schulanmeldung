<?php

namespace App\Controller;

use App\Entity\Fluechtling;
use App\Form\FluechtlingType;
use App\Repository\FluechtlingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fluechtling")
 */
class FluechtlingController extends AbstractController
{
    /**
     * @Route("/", name="fluechtling_index", methods="GET")
     */
    public function index(FluechtlingRepository $fluechtlingRepository): Response
    {
        return $this->render('fluechtling/index.html.twig', ['fluechtlings' => $fluechtlingRepository->findAll()]);
    }

    /**
     * @Route("/new", name="fluechtling_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $fluechtling = new Fluechtling();
        $form = $this->createForm(FluechtlingType::class, $fluechtling);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fluechtling);
            $em->flush();

            return $this->redirectToRoute('fluechtling_index');
        }

        return $this->render('fluechtling/new.html.twig', [
            'fluechtling' => $fluechtling,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fluechtling_show", methods="GET")
     */
    public function show(Fluechtling $fluechtling): Response
    {
        return $this->render('fluechtling/show.html.twig', ['fluechtling' => $fluechtling]);
    }

    /**
     * @Route("/{id}/edit", name="fluechtling_edit", methods="GET|POST")
     */
    public function edit(Request $request, Fluechtling $fluechtling): Response
    {
        $form = $this->createForm(FluechtlingType::class, $fluechtling);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fluechtling_edit', ['id' => $fluechtling->getId()]);
        }

        return $this->render('fluechtling/edit.html.twig', [
            'fluechtling' => $fluechtling,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fluechtling_delete", methods="DELETE")
     */
    public function delete(Request $request, Fluechtling $fluechtling): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fluechtling->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fluechtling);
            $em->flush();
        }

        return $this->redirectToRoute('fluechtling_index');
    }
}
