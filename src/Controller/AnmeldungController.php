<?php

namespace App\Controller;

use App\Entity\Ausbildung;
use App\Entity\Betrieb;
use App\Entity\Kammer;
use App\Entity\Registrierung;
use App\Entity\Schueler;
use App\Form\StartType;
use App\Form\AusbildungType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\ConstraintViolation;
use App\Entity\Registrierung;
use App\Form\RegistrierungType;
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
     * @Route("/start", name="start")
     */
    public function start(Request $request)
    {
        $session = new Session();
        $schueler = new Schueler();
        $registrierung = new Registrierung();

        $registrierung->setIp($request->getClientIp());
        $registrierung->setDatum(new DateTime());
        $registrierung->setSchueler($schueler);

        $form = $this->createForm(StartType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $registrierung->setIstEQMassnahme($data['istEQMassnahme']);
            $registrierung->setTyp($data['typ']);
            $session->set('registrierung', $registrierung);
            $session->set('schueler', $schueler);
            switch($data['typ']) {
                case "AUAU":
                    return $this->redirectToRoute('ausbildung');
                case "UM":
                    return $this->redirectToRoute('umschulung');
                default:
                    $this->redirectToRoute('error');
            }
        }
        $session->set('registrierung', $registrierung);
        return $this->render('anmeldung/start.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/ausbildung", name="ausbildung")
     */
    public function ausbildung(Request $request) {
        $session = new Session();
        if(!($session->has('registrierung') && $session->has('schueler'))) {
            $session->invalidate();
            return $this->redirectToRoute('start');
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
                //die(var_dump($form));
                //die($betrieb->getName());
                $ausbildung->setBetrieb($betrieb);
                $session->set('betrieb', $betrieb);
                $session->set('beruf', $form->get('beruf')->getData());
                $session->set('ausbildung', $form->getData());
                return $this->redirectToRoute('success');
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
                    return $this->redirectToRoute('success');
                }
            }
        }
        /*
        if($session->has('betrieb')) {
            $betrieb = $session->get('betrieb');
            $this->getDoctrine()->getManager()->persist($betrieb);
            $betriebe[] = $betrieb;
            $form = $this->createForm(AusbildungType::class, $ausbildung, [
                'betriebe' => $betriebe,
                'betriebNeu' => $betrieb]);
        } else {
            $form = $this->createForm(AusbildungType::class, $ausbildung, [
                'betriebe' => $betriebe, 'betriebNeu' => null]);
        }

*/


            //$this->getDoctrine()->getManager()->flush();



        return $this->render('anmeldung/ausbildung.html.twig', [
           'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/success", name="success")
     */
    public function success(Request $request) {
        $session = new Session();
        if($session->has('ausbildung')) {
            return $this->render('anmeldung/success.html.twig', [
                'betrieb' => $session->get('betrieb')->getName(),
                'beruf' => $session->get('beruf')->getBezeichnung()
            ]);
        } else {
            $session->invalidate();
            return $this->redirectToRoute('start');
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
        //TODO daten zusammensammeln und ans Template weitergeben
        //TODO Objekte validieren und ggf Fehlermeldungen anzeigen
        $session = $request->getSession();

        $registrierung = $session->get('registrierung');

        $registrierungsForm = $this->createForm(RegistrierungType::class, $registrierung);


        $templateOptions = [
            'registrierungsForm' => $registrierungsForm->createView(),
        ];
        return $this->render('anmeldung/check.html.twig', $templateOptions);
    }
}
