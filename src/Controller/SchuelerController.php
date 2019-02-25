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
     * @Route("/", name="schueler_index")
     */
    public function index(Request $request) {
        $session = $request->getSession();
        if($session->has('registrierung')) {
            $schueler = $session->get('schueler');
            //$this->getDoctrine()->getManager()->persist($schueler->getAusbildung());
            $form = $this->createForm(SchuelerType::class, $schueler);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()) {
                $schueler = $form->getData();
                $session->set('schueler', $schueler);
                return $this->redirectToRoute('daten_pruefen');
            }
            return $this->render('anmeldung/schueler.html.twig', [
                'form' => $form->createView()
            ]);
        } else {
            $session->invalidate();
            return $this->redirectToRoute('anmeldung_start');
        }

    }

    /**
     * @Route("/view", name="schueler_view", methods="GET")
     */
    public function view(SchuelerRepository $schuelerRepository): Response
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
     * @Route("/update", name="schueler_update", methods="GET|POST")
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $session = $request->getSession();
        $schueler = $session->get('schueler');
        $form = $this->createForm(SchuelerType::class, $schueler);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
