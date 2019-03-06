<?php

namespace App\Controller;

use App\Entity\Schulbesuch;
use App\Entity\Schule;
use App\Form\SchulbesuchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/schulbesuch")
*/
class SchulbesuchController extends AbstractController
{
    /**
    * @Route("/neu", name="schulbesuch_new", methods={"GET","POST"})
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
        $schulen[] = $this->getVerified();
        $schulbesuch = new Schulbesuch();
        if($session->has('schule')) {
            $schule = $session->get('schule');
            $schulen[] = $schule;
            $this->getDoctrine()->getManager()->persist($schule);
        } else {
            $schule = null;
        }

        $form = $this->createForm(SchulbesuchType::class, $schulbesuch, ['schulen' => $schulen, 'schule' => $schule]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $schulbesuch = $form->getData();
            if($session->has('schule')) {
                $schulbesuch->setSchule($session->get('schule'));
                $session->remove('schule');
            }
            $session->get('registrierung')->getSchueler()->addSchulbesuch($form->getData());

            return $this->redirectToRoute('vorbildung_index');
        }

        return $this->render('schulbesuch/new.html.twig', [
        'schulbesuch' => $schulbesuch,
        'form' => $form->createView(),
        'buttonPath' => 'vorbildung_index'
        ]);
    }
    /**
     * @Route("/update", name="schulbesuch_update", methods={"GET","POST"})
     */
    public function update(Request $request): Response {
        $schulbesuch = new Schulbesuch();
        $session = $request->getSession();
        $session->set('update', true);
        $schulen[] = $this->getVerified();
        if($session->has('schule')) {
            $schule = $session->get('schule');
            $this->getDoctrine()->getManager()->persist($schule);
            $schulen[] = $schule;
        } else {
            $schule = null;
        }
        $form = $this->createForm(SchulbesuchType::class, new Schulbesuch(), [
            'schule' => $schule,
            'schulen' => $schulen
        ]);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $schulbesuch = $form->getData();
            if($session->has('schule')) {
                $schulbesuch->setSchule($session->get('schule'));
                $session->remove('schule');
            }
            $session->remove('update');
            $session->get('registrierung')->getSchueler()->addSchulbesuch($schulbesuch);
            return $this->redirectToRoute('daten_pruefen');
        }
        return $this->render('schulbesuch/new.html.twig', [
            'schulbesuch' => $schulbesuch,
            'form' => $form->createView(),
            'buttonPath' => 'daten_pruefen'
        ]);
    }

    private function getVerified() {
        return $this->getDoctrine()->getRepository(Schule::class)->findAllVerified();
    }
}