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
     * @Route("/", name="fluechtling_index")
     */
    public function index(Request $request) {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }

        if($session->has('fluechtling')) {
            $fluechtling = $session->get('fluechtling');
        } else {
            $fluechtling = new Fluechtling();
        }

        $form = $this->createForm(FluechtlingType::class, $fluechtling);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $schueler = $session->get('schueler');
            $fluechtling = $form->getData();

            $schueler->setFluechtling($fluechtling);
            $fluechtling->setSchueler($schueler);

            $session->set('schueler', $schueler);
            $session->set('fluechtling', $fluechtling);
            return $this->redirectToRoute('schueler_index');
        }
        return $this->render('fluechtling/_form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/view", name="fluechtling_view", methods="GET")
     */
    public function view(FluechtlingRepository $fluechtlingRepository): Response
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
     * @Route("/update", name="fluechtling_update", methods="GET|POST")
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $session = $request->getSession();
        $fluechtling = $session->get('fluechtling');
        $form = $this->createForm(FluechtlingType::class, $fluechtling);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('daten_pruefen');
        }

        return $this->render('fluechtling/update.html.twig', [
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
