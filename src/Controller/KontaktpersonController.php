<?php

namespace App\Controller;

use App\Entity\Kontaktperson;
use App\Entity\Schueler;
use App\Form\KontaktpersonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

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
        $schueler = $session->get('registrierung')->getSchueler();
        $heute = new \DateTime('now');
        $geburtstag = $schueler->getGeburtsdatum();
        $alter = $geburtstag->diff($heute)->format('%y');
        $minderjaehrig = $alter<18?true:false;
        return $this->render('kontaktperson/index.html.twig', [
            'kontaktpeople' => $schueler->getKontaktpersonen(),
            'minderjaehrig' => $minderjaehrig,
            'alter' => $alter
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
            'buttonPath' => 'kontaktperson_index'
        ]);
    }
    /**
     * @Route("/update", name="kontaktperson_update", methods={"GET","POST"})
     */
    public function update(Request $request): Response
    {
        $session = $request->getSession();
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

            return $this->redirectToRoute('daten_pruefen');
        }

        return $this->render('kontaktperson/new.html.twig', [
            'kontaktperson' => $kontaktperson,
            'form' => $form->createView(),
            'buttonPath' => 'daten_pruefen'
        ]);
    }
}
