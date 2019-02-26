<?php

namespace App\Controller;

use App\Form\AllgemeinType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AllgemeinController
 * @package App\Controller
 * @Route("/allgemein")
 */
class AllgemeinController extends AbstractController
{
    /**
     * @Route("/", name="allgemein_new")
     */
    public function new(Request $request)
    {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }

        $data = [];
        if(!empty($session->get('registrierung')->getEintrittAm())) {
            $data[] = $session->get('registrierung')->getEintrittAm();
        }
        if(!empty($session->get('registrierung')->getWohnheim())) {
            $data[] = $session->get('registrierung')->getWohnheim();
        }
        if(!empty($session->get('registrierung')->getMitteilung())) {
            $data[] = $session->get('registrierung')->getMitteilung();
        }

        $form = $this->createForm(AllgemeinType::class, $data);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $session->get('registrierung')->setEintrittAm($data['eintrittAm']);
            $session->get('registrierung')->setWohnheim($data['wohnheim']);
            $session->get('registrierung')->setMitteilung($data['mitteilung']);

            return $this->redirectToRoute('daten_pruefen');
        }
        return $this->render('allgemein/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
