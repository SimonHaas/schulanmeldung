<?php

namespace App\Controller;

use App\Entity\Schueler;
use App\Form\SchuelerType;
use App\Repository\SchuelerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/schueler")
 */
class SchuelerController extends AbstractController
{
    /**
     * @Route("/", name="schueler_index", methods="GET")
     */
    public function index(SchuelerRepository $schuelerRepository): Response
    {
        return $this->render('schueler/index.html.twig', ['schuelers' => $schuelerRepository->findAll()]);
    }

    /**
     * @Route("/new", name="schueler_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $schueler = new Schueler();
        $form = $this->createForm(SchuelerType::class, $schueler);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($schueler);
            $em->flush();

            return $this->redirectToRoute('schueler_index');
        }

        return $this->render('schueler/new.html.twig', [
            'schueler' => $schueler,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="schueler_show", methods="GET")
     */
    public function show(Schueler $schueler): Response
    {
        return $this->render('schueler/show.html.twig', ['schueler' => $schueler]);
    }

    /**
     * @Route("/{id}/edit", name="schueler_edit", methods="GET|POST")
     */
    public function edit(Request $request, Schueler $schueler): Response
    {
        $form = $this->createForm(SchuelerType::class, $schueler);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('schueler_edit', ['id' => $schueler->getId()]);
        }

        return $this->render('schueler/edit.html.twig', [
            'schueler' => $schueler,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="schueler_delete", methods="DELETE")
     */
    public function delete(Request $request, Schueler $schueler): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schueler->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($schueler);
            $em->flush();
        }

        return $this->redirectToRoute('schueler_index');
    }
}
