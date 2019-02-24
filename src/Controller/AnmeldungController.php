<?php

namespace App\Controller;

use App\Entity\Betrieb;
use App\Entity\Kontaktperson;
use App\Entity\Registrierung;
use App\Entity\Schueler;
use App\Repository\SchuelerRepository;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class AnmeldungController extends AbstractController
{
    /**
     * @Route("/", name="anmeldung")
     * @throws Exception
     */
    public function index(Request $request)
    {
        $session = new Session();

        $registrierung = new Registrierung();
        $registrierung->setIp($request->getClientIp());
        $registrierung->setDatum(new DateTime());
        $registrierung->setMitteilung('das ist eine Test-Mitteilung');

        $schueler = new Schueler();
        $schueler->setGeburtsdatum(new DateTime());
        $schueler->setGeburtsort('Berlin');
        $schueler->setNachname('Haas');
        $schueler->setVorname('Simon');
        $schueler->setRufname('Simon');

        $kontaktperson = new Kontaktperson();
        $kontaktperson->setVorname('Rosi');
        $kontaktperson->setNachname('Haas');
        //TODO kontaktpersonen als Array speichern
        $session->set('kontaktperson', $kontaktperson);

        $betrieb = new Betrieb();
        $betrieb->setEmail('etst@test.de');
        $session->set('betrieb', $betrieb);

        $registrierung->setSchueler($schueler);
        $session->set('registrierung', $registrierung);

        return $this->render('anmeldung/index.html.twig');
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
        $kontaktperson = $session->get('kontaktperson');
        $betrieb = $session->get('betrieb');
        $fluechtling = $session->get('fluechtling', false);
        $umschueler = $session->get('umschueler', false);

        $schulbesuche = $registrierung->getSchueler()->getSchulbesuche();


        $templateOptions = [
            'registrierung' => $registrierung,
            'kontaktperson' => $kontaktperson,
            'betrieb' => $betrieb,
            'fluechtling' => $fluechtling,
            'umschueler' => $umschueler,
            'schulbesuche' => $schulbesuche,
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
        $session = $request->getSession();
        $registrierung = $session->get('registrierung');
        //TODO auch noch alles andere aus der Session holen und speichern

        $em = $this->getDoctrine()->getManager();
        $em->persist($registrierung);
        $em->flush();

        //TODO Session zerstören

        return $this->render('anmeldung/beendet.html.twig');
    }
}
