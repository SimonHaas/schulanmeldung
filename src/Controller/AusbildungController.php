<?php

namespace App\Controller;

use App\Entity\Ausbildung;
use App\Form\AusbildungType;
use App\Repository\BetriebRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AusbildungController
 * @package App\Controller
 * @Route("/ausbildung")
 */
class AusbildungController extends AbstractController
{
    /**
     * @Route("/", name="ausbildung_new")
     * @param Request $request
     * @param BetriebRepository $betriebRepository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function new(Request $request, BetriebRepository $betriebRepository)
    {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }

        if(!empty($session->get('registrierung')->getSchueler()->getAusbildung())) {
            $ausbildung = $session->get('registrierung')->getSchueler()->getAusbildung();
            if(!empty($ausbildung->getBetrieb())) {
                $this->getDoctrine()->getManager()->persist($ausbildung->getBetrieb());
            }
            if(!empty($ausbildung->getBeruf())) {
                $this->getDoctrine()->getManager()->persist($ausbildung->getBeruf());
            }
        } else {
            $ausbildung = new Ausbildung();
        }
        $betriebe[] = $betriebRepository->findAllVerified();

        if($session->has('betrieb')) {
            $betriebNeu = $session->get('betrieb');
            $this->getDoctrine()->getManager()->persist($betriebNeu);
            $betriebe[] = $betriebNeu;
        } else {
            $betriebNeu = null;
        }

        $form = $this->createForm(AusbildungType::class, $ausbildung, ['betriebe' => $betriebe, 'betriebNeu' => $betriebNeu]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $ausbildung = $form->getData();

            $schueler = $session->get('registrierung')->getSchueler();
            $schueler->setAusbildung($ausbildung);
            $session->get('registrierung')->setSchueler($schueler);

            return $this->redirectToRoute('schueler_new');
        }
        return $this->render('ausbildung/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/update", name="ausbildung_update", methods="GET|POST")
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $session = $request->getSession();
        //TODO Ausbildung aus der Registrierung ableiten
        $ausbildung = $session->get('ausbildung');
        $form = $this->createForm(AusbildungType::class, $ausbildung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('daten_pruefen');
        }

        return $this->render('ausbildung/update.html.twig', [
            'ausbildung' => $ausbildung,
            'form' => $form->createView(),
        ]);
    }
}
