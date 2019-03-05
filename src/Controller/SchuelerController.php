<?php

namespace App\Controller;

use App\Entity\Schueler;
use App\Form\SchuelerType;
use App\Repository\SchuelerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/schueler")
 */
class SchuelerController extends AbstractController
{

    /**
     * @Route("/view", name="schueler_view", methods="GET")
     */
    public function view(SchuelerRepository $schuelerRepository): Response
    {
        return $this->render('schueler/index.html.twig', ['schuelers' => $schuelerRepository->findAll()]);
    }

    /**
     * @Route("/", name="schueler_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {

        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }
        if(!empty($session->get('registrierung')->getSchueler())) {
            $schueler = $session->get('registrierung')->getSchueler();
        } else {
            $schueler = new Schueler();
        }
        $form = $this->createForm(SchuelerType::class, $schueler);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $schueler = $form->getData();

            $session->get('registrierung')->setSchueler($schueler);
            return $this->redirectToRoute('kontaktperson_index');
        }
        return $this->render('schueler/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/update", name="schueler_update", methods="GET|POST")
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $session = $request->getSession();
        $schueler = $session->get('registrierung')->getSchueler();
        $form = $this->createForm(SchuelerType::class, $schueler);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $session->get('registrierung')->setSchueler($form->getData());
            return $this->redirectToRoute('daten_pruefen');
        }

        return $this->render('schueler/update.html.twig', [
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
