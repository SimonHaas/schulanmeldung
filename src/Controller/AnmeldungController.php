<?php

namespace App\Controller;

use App\Entity\Beruf;
use App\Entity\Betrieb;
use App\Entity\Registrierung;
use App\Entity\Schule;
use App\Form\StartType;
use App\Entity\Schueler;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Exception;

/**
 * Class AnmeldungController
 * @package App\Controller
 * @Route("/anmeldung")
 */
class AnmeldungController extends AbstractController
{
    /**
     * @Route("/", name="anmeldung_start")
     */
    public function index(Request $request)
    {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            $session = new Session();
        }

        if($session->has('registrierung')) {
            $registrierung = $session->get('registrierung');
            $schueler = $registrierung->getSchueler();
        } else {
            $schueler = new Schueler();
            $registrierung = new Registrierung();
            $registrierung->setSchueler($schueler);
            $registrierung->setIp($request->getClientIp());
            try {
                $registrierung->setDatum(new DateTime());
            } catch (Exception $e) {
            }
        }

        $form = $this->createForm(StartType::class, $registrierung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $registrierung = $form->getData();
            $session->set('registrierung', $registrierung);
            $session->set('schueler', $schueler);

            switch($registrierung->getTyp()) {
                case "AUAU": case "EQ":
                    return $this->redirectToRoute('ausbildung_new');
                case "UM":
                    return $this->redirectToRoute('umschueler_new');
                case "BIK":
                    return $this->redirectToRoute('fluechtling_new');
                default:
                    return $this->redirectToRoute('schueler_new');
            }
        }
        return $this->render('anmeldung/start.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/daten-pruefen", name="daten_pruefen")
     * @param Request $request
     * @return Response
     */
    public function check(Request $request)
    {
        //TODO daten zusammensammeln und ans Template weitergeben
        //TODO Objekte validieren und ggf Fehlermeldungen anzeigen
        $session = $request->getSession();

        /** @var Registrierung $registrierung */
        $registrierung = $session->get('registrierung');
        $schueler = $registrierung->getSchueler();
        $kontaktpersonen = $schueler->getKontaktpersonen();
        $fluechtling = $schueler->getFluechtling();
        $umschueler = $schueler->getUmschueler();
        $ausbildung = $schueler->getAusbildung();
        $schulbesuche = $registrierung->getSchueler()->getSchulbesuche();


        $templateOptions = [
            'registrierung' => $registrierung,
            'kontaktpersonen' => $kontaktpersonen,
            'fluechtling' => $fluechtling,
            'umschueler' => $umschueler,
            'schulbesuche' => $schulbesuche,
            'ausbildung' => $ausbildung
        ];
        return $this->render('anmeldung/check.html.twig', $templateOptions);
    }

    /**
     * @Route("/beenden", name="anmeldung_beenden")
     * @param Request $request
     * @return string
     */
    public function beenden(Request $request)
    {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }
        //TODO sicherstellen, dass man vorher auf den 'Abschliessen'-Button gedrueckt hat

        $em = $this->getDoctrine()->getManager();
        $registrierung = $session->get('registrierung');
        $schueler = $registrierung->getSchueler();
        if(!empty($schueler->getAusbildung())) {
            // Handle Ausbildung-Entity related stuff
            $ausbildung = $schueler->getAusbildung();
            $beruf = $this->getDoctrine()->getRepository(Beruf::class)->find($ausbildung->getBeruf()->getId());
            $betrieb = $ausbildung->getBetrieb();
            if(empty($betrieb->getId())) {
                // new betrieb, let's persist it!
                $this->getDoctrine()->getManager()->persist($betrieb);
            } else {
                // betrieb is canned, so search for it again and reassign it, because doctrine is really strange
                $betrieb = $this->getDoctrine()->getRepository(Betrieb::class)->find($betrieb->getId());
            }

            $ausbildung->setBeruf($beruf);
            $ausbildung->setBetrieb($betrieb);
            $schueler->setAusbildung($ausbildung);
        }
        $schulbesuche = $registrierung->getSchueler()->getSchulbesuche();

        foreach ($schulbesuche as $schulbesuch) {
            if(empty($schulbesuch->getSchule()->getId())) {
                // New Schule added, let's persist it!
                $em->persist($schulbesuch->getSchule());
            } else {
                // Schule is canned, so search for it again and reassign it

                // First, let's remove the "old" schulbesuch from schueler
                $registrierung->getSchueler()->removeSchulbesuch($schulbesuch);
                // Then, let's search 'n' replace
                $schule = $this->getDoctrine()->getRepository(Schule::class)->find($schulbesuch->getSchule()->getId());
                $schulbesuch->setSchule($schule);
                // Last, re-add schulbesuch to schueler
                $registrierung->getSchueler()->addSchulbesuch($schulbesuch);
            }
        }
        $registrierung->setSchueler($schueler);

        $em->persist($registrierung);
        $em->flush();

        $session->invalidate();

        return $this->render('anmeldung/beendet.html.twig');
    }
}
