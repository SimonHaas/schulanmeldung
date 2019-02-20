<?php

namespace App\Controller;

use App\Entity\Registrierung;
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
     * @Route("/daten-pruefen/{Registrierung}", name="daten_pruefen")
     * @param Registrierung $registrierung
     * @return Response
     */
    public function check(Registrierung $registrierung)
    {
        //TODO daten zusammensammeln und ans Template weitergeben

        return $this->render('anmeldung/check.html.twig');
    }
}
