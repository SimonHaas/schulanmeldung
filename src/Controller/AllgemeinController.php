<?php

namespace App\Controller;

use App\Entity\Registrierung;
use App\Form\AllgemeinType;
use DateTime;
use http\Env;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Dotenv\Dotenv;
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
     * @throws \Exception
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
            /** @var Registrierung $registrierung */
            $registrierung = $session->get('registrierung');
            $registrierung->setWohnheim($data['wohnheim']);
            $registrierung->setMitteilung($data['mitteilung']);
            $datumErsteHaelfte = new DateTime(getenv('EINTRITTSDATUM_ERSTE_HAELFTE'));
            $datumZweiteHaelfte = new DateTime(getenv('EINTRITTSDATUM_ZWEITE_HAELFTE'));
            $heute = new DateTime();
            if($heute < $datumErsteHaelfte)
                $registrierung->setEintrittAm($datumErsteHaelfte);
            else
                $registrierung->setEintrittAm($datumZweiteHaelfte);

            return $this->redirectToRoute('daten_pruefen');
        }
        return $this->render('allgemein/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/update", name="allgemein_update")
     */
    public function update(Request $request)
    {
        $session = $request->getSession();
        $registrierung = $session->get('registrierung');
        $form = $this->createForm(AllgemeinType::class, $registrierung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $session->set('registrierung', $form->getData());
            return $this->redirectToRoute('daten_pruefen');
        }

        return $this->render('allgemein/update.html.twig', [
            'registrierung' => $registrierung,
            'form' => $form->createView(),
        ]);
    }

}
