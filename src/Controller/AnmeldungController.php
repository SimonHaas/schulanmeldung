<?php

namespace App\Controller;

use App\Entity\Ausbildung;
use App\Entity\Betrieb;
use App\Entity\Fluechtling;
use App\Entity\Registrierung;
use App\Entity\Schueler;
use App\Entity\Umschueler;
use App\Form\FluechtlingType;
use App\Form\SchuelerType;
use App\Form\StartType;
use App\Form\AusbildungType;
use App\Form\UmschuelerType;
use DateTime;
use Symfony\Component\Routing\Annotation\Route;
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
     * @Route("/start", name="anmeldung_start")
     */
    public function start(Request $request)
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
                    return $this->redirectToRoute('anmeldung_ausbildung');
                case "UM":
                    return $this->redirectToRoute('anmeldung_umschulung');
                case "BIK":
                    return $this->redirectToRoute('anmeldung_fluechtling');
                default:
                    $this->redirectToRoute('error');
            }
        }
        return $this->render('anmeldung/start.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/ausbildung", name="anmeldung_ausbildung")
     */
    public function ausbildung(Request $request) {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }

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
                $session->set('betrieb', $betrieb);
                $session->set('beruf', $form->get('beruf')->getData());
                $session->set('ausbildung', $form->getData());
                return $this->redirectToRoute('anmeldung_schueler');
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
                $session->set('betrieb', $betrieb);
                $session->set('ausbildung', $ausbildung);
            } else {
                if ($form->isSubmitted() && $form->isValid()) {
                    $betrieb = $form->get('betrieb')->getData();
                    $session->set('betrieb', $betrieb);
                    $session->set('beruf', $form->get('beruf')->getData());
                    $session->set('ausbildung', $form->getData());
                    return $this->redirectToRoute('anmeldung_schueler');
                }
            }
        }
        return $this->render('anmeldung/ausbildung.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/umschulung", name="anmeldung_umschulung")
     */
    public function umschulung(Request $request) {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }

        if($session->has('umschueler')) {
            $umschueler = $session->get('umschueler');
        } else {
            $umschueler = new Umschueler();
        }

        $form = $this->createForm(UmschuelerType::class, $umschueler);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $schueler = $session->get('schueler');
            $umschueler = $form->getData();

            $schueler->setUmschueler($umschueler);
            $umschueler->setSchueler($schueler);

            $session->set('schueler', $schueler);
            $session->set('umschueler', $umschueler);
            return $this->redirectToRoute('anmeldung_schueler');
        }
        return $this->render('anmeldung/umschulung.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/fluechtling", name="anmeldung_fluechtling")
     */
    public function fluechtling(Request $request) {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }

        if($session->has('fluechtling')) {
            $fluechtling = $session->get('fluechtling');
        } else {
            $fluechtling = new Fluechtling();
        }

        $form = $this->createForm(FluechtlingType::class, $fluechtling);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $schueler = $session->get('schueler');
            $fluechtling = $form->getData();

            $schueler->setFluechtling($fluechtling);
            $fluechtling->setSchueler($schueler);

            $session->set('schueler', $schueler);
            $session->set('fluechtling', $fluechtling);
            return $this->redirectToRoute('anmeldung_schueler');
        }
        return $this->render('anmeldung/fluechtling.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/schueler", name="anmeldung_schueler")
     */
    public function schueler(Request $request) {
        $session = $request->getSession();
        if($session->has('registrierung')) {
            $schueler = $session->get('schueler');
            //$this->getDoctrine()->getManager()->persist($schueler->getAusbildung());
            $form = $this->createForm(SchuelerType::class, $schueler);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()) {
                $schueler = $form->getData();
                $session->set('schueler', $schueler);
                return $this->redirectToRoute('daten_pruefen');
            }
            return $this->render('anmeldung/schueler.html.twig', [
                'form' => $form->createView()
            ]);
        } else {
            $session->invalidate();
            return $this->redirectToRoute('anmeldung_start');
        }

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

    /**
     * @Route("/anmeldung", name="anmeldung")
     * @throws Exception
     */
    public function index(Request $request)
    {
        $session = new Session();

        $registrierung = new Registrierung();
        $registrierung->setIp($request->getClientIp());
        $registrierung->setDatum(new DateTime());
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
        /*
        $session = $request->getSession();
        if($session->has('registrierung')) {
            $session->invalidate();
        }
        */
        return $this->render('anmeldung/check.html.twig');
    }
}
