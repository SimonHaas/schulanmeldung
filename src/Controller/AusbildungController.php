<?php

namespace App\Controller;

use App\Entity\Ausbildung;
use App\Entity\Betrieb;
use App\Form\AusbildungType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AusbildungController extends AbstractController
{
    /**
     * @Route("/ausbildung", name="ausbildung_index")
     */
    public function index(Request $request)
    {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }
        $betriebeRepo = $this->getDoctrine()->getRepository(Betrieb::class);
        $ausbildung = new Ausbildung();
        $betriebe[] = $betriebeRepo->findBy(['istVerifiziert'=>true]);
        $form = $this->createForm(AusbildungType::class, $ausbildung, ['betriebe' => $betriebe, 'betriebNeu' => null]);
        /*
        $ausbildung = new Ausbildung();
        $schueler = $session->get('schueler');
        $schueler->setAusbildung($ausbildung);
        $ausbildung->setSchueler($schueler);
        $betriebe[] = $this->getDoctrine()->getRepository(Betrieb::class)->findBy(['istVerifiziert'=>true]);
        if($session->has('betrieb')) {
            $betrieb = $session->get('betrieb');
            $this->getDoctrine()->getManager()->persist($betrieb);
            $betriebe[] = $betrieb;
            $ausbildung->setBetrieb($betrieb);
            $form = $this->createForm(AusbildungType::class, $ausbildung, [
                'betriebe' => $betriebe,
                'betriebNeu' => $betrieb]);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $betrieb = $form->get('betrieb')->getData();
                $ausbildung->setBetrieb($betrieb);
                //$session->set('betrieb', $betrieb);
                //$session->set('beruf', $form->get('beruf')->getData());
                //$session->set('ausbildung', $form->getData());
                return $this->redirectToRoute('schueler_index');
            }
        } else {
            $form = $this->createForm(AusbildungType::class, $ausbildung, ['betriebe' => $betriebe, 'betriebNeu' => null]);
            $form->handleRequest($request);
            if ($form->get('betriebNeu')->isSubmitted() && $form->get('betriebNeu')->isValid() && !empty($form->get('betriebNeu')->getData()->getName())) {
                $betrieb = $form->get('betriebNeu')->getData();
                $this->getDoctrine()->getManager()->persist($betrieb);
                $betriebe[] = $betrieb;
                $form = $this->createForm(AusbildungType::class, $ausbildung, [
                    'betriebe' => $betriebe,
                    'betriebNeu' => $betrieb]);
                $ausbildung->setBetrieb($betrieb);
                //$session->set('betrieb', $betrieb);
                //$session->set('ausbildung', $ausbildung);
            } else {
                if ($form->isSubmitted() && $form->isValid()) {
                    $betrieb = $form->get('betrieb')->getData();
                    //$session->set('betrieb', $betrieb);
                    //$session->set('beruf', $form->get('beruf')->getData());
                    //$session->set('ausbildung', $form->getData());
                    return $this->redirectToRoute('schueler_index');
                }
            }
        }
        */
        return $this->render('ausbildung/_form.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
