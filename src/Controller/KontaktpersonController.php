<?php

namespace App\Controller;

use App\Entity\Kontaktperson;
use App\Form\KontaktpersonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/kontaktperson")
 */
class KontaktpersonController extends AbstractController
{
    /**
     * @Route("/", name="kontaktperson_index", methods={"GET"})
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
        return $this->render('kontaktperson/index.html.twig', [
            'kontaktpeople' => $session->get('registrierung')->getSchueler()->getKontaktpersonen(),
        ]);
    }

    /**
     * @Route("/neu", name="kontaktperson_new", methods={"GET","POST"})
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

        $kontaktperson = new Kontaktperson();
        $form = $this->createForm(KontaktpersonType::class, $kontaktperson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $kontaktperson = $form->getData();
            if($kontaktperson->getArt() == "ET") {
                if($kontaktperson->getAnrede() == "H") {
                    $kontaktperson->setArt("VA");
                } elseif ($kontaktperson->getAnrede() == "F") {
                    $kontaktperson->setArt("MU");
                }
            }
           $session->get('registrierung')->getSchueler()->addKontaktperson($kontaktperson);

            return $this->redirectToRoute('kontaktperson_index');
        }

        return $this->render('kontaktperson/new.html.twig', [
            'kontaktperson' => $kontaktperson,
            'form' => $form->createView(),
        ]);
    }
}
