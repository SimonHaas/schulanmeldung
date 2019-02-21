<?php

namespace App\Controller;

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
        $schueler = $this->getDoctrine()->getRepository(Schueler::class)->find(1);
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

        $registrierung = $session->get('registrierung');


        $templateOptions = [
            'registrierung' => $registrierung,
        ];
        return $this->render('anmeldung/check.html.twig', $templateOptions);
    }
}
