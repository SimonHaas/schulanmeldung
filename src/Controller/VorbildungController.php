<?php

namespace App\Controller;

use App\Form\VorbildungType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vorbildung")
 */
class VorbildungController extends AbstractController
{
    /**
     * @Route("/", name="vorbildung_index", methods={"GET|POST"})
     */
    public function index(Request $request): Response
    {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }
        $schueler = $session->get('registrierung')->getSchueler();
        $form = $this->createForm(VorbildungType::class, $schueler);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $session->get('registrierung')->setSchueler($form->getData());

            return $this->redirectToRoute('allgemein_new');
        }
        return $this->render('vorbildung/index.html.twig', [
            'form' => $form->createView(),
            'schulbesuche' => $session->get('registrierung')->getSchueler()->getSchulbesuche(),
        ]);
    }
    /**
     * @Route("/update", name="vorbildung_update", methods={"GET|POST"})
     */
    public function update(Request $request): Response
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
            $request->getSession()->invalidate();
            return $this->redirectToRoute('anmeldung_start');
        }
        $form = $this->createForm(VorbildungType::class, $schueler);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $session->get('registrierung')->setSchueler($form->getData());

            return $this->redirectToRoute('daten_pruefen');
        }
        return $this->render('vorbildung/update.html.twig', [
            'form' => $form->createView(),
            'schulbesuche' => $session->get('registrierung')->getSchueler()->getSchulbesuche(),
        ]);
    }
}
