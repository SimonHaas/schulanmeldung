<?php

namespace App\Controller;

use App\Entity\Registrierung;
use App\Form\StartType;
use App\Entity\Schueler;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
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
            $schueler = $registrierung->getSchueler();
            $session->set('registrierung', $registrierung);
            $session->set('schueler', $schueler);
            switch($registrierung->getTyp()) {
                case "AUAU":
                    return $this->redirectToRoute('ausbildung_index');
                case "UM":
                    return $this->redirectToRoute('umschueler_index');
                case "BIK":
                    return $this->redirectToRoute('fluechtling_index');
                default:
                    $this->redirectToRoute('error');
            }
        }
        return $this->render('anmeldung/start.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/success", name="anmeldung_success")
     */
    public function success(Request $request) {
        $session = $request->getSession();
        if($session->has('ausbildung')) {
            return $this->render('anmeldung/success.html.twig', [
                'betrieb' => $session->get('betrieb')->getName(),
                'beruf' => $session->get('beruf')->getBezeichnung()
            ]);
        } else {
            $session->invalidate();
            return $this->redirectToRoute('anmeldung_start');
        }

    }

    /*
    /**
     * @Route("/", name="anmeldung")
     * @throws Exception
     */
    /*
    public function index(Request $request)
    {
        $session = new Session();

        $registrierung = new Registrierung();
        $registrierung
            ->setIp($request->getClientIp())
            ->setDatum(new DateTime())
            ->setMitteilung('das ist eine Test-Mitteilung')
            ->setWohnheim(false)
            ->setEintrittAm(new DateTime())
            ->setTyp(1)
            ->setIstEQMassnahme(false);

        $schueler = new Schueler();
        $schueler
            ->setGeburtsdatum(new DateTime())
            ->setGeburtsort('Berlin')
            ->setNachname('Haas')
            ->setVorname('Meiersodifasdof')
            ->setRufname('Simon');

        $kontaktperson = new Kontaktperson();
        $kontaktperson
            ->setVorname('Rosi')
            ->setNachname('Haas');

        $betrieb = new Betrieb();
        $betrieb->setEmail('etst@test.de');

        $registrierung->setSchueler($schueler);

        $registrierung->setSchueler($schueler);
        $session->set('registrierung', $registrierung);

        $schueler->setNachname('Das wurde nach dem Speichern in der Session gesetzt');


        return $this->render('anmeldung/index.html.twig');
    }
    */

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
        //TODO nur Registrierung in Session speichern und alles andere über entsprechende Relationen bekommen?
        $registrierung = $session->get('registrierung');
        $schueler = $registrierung->getSchueler();
        $kontaktpersonen = $schueler->getKontaktpersonen();
        $betrieb = $session->get('betrieb');
        $fluechtling = $session->get('fluechtling', false);
        $umschueler = $session->get('umschueler', false);

        $schulbesuche = $registrierung->getSchueler()->getSchulbesuche();


        $templateOptions = [
            'registrierung' => $registrierung,
            'kontaktpersonen' => $kontaktpersonen,
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
        //TODO sicherstellen, dass man vorher auf den 'Abschliessen'-Button gedrueckt hat

        $session = $request->getSession();
        $registrierung = $session->get('registrierung');
        $em = $this->getDoctrine()->getManager();
        // das speichert alles was an der Registrierung dran haengt
        $em->persist($registrierung);
        $em->flush();

        $session->invalidate();

        return $this->render('anmeldung/beendet.html.twig');
    }
}
