<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnmeldungController extends AbstractController
{
    /**
     * @Route("/anmeldung", name="anmeldung")
     */
    public function index()
    {
        return $this->render('anmeldung/index.html.twig', [
            'controller_name' => 'AnmeldungController',
        ]);
    }


    /**
     * @Route("datenschutz", name="datenschutz")
     * @param Request $request
     * @return Response
     */
    public function datenschutz(Request $request)
    {
        return $this->render('anmeldung/datenschutz.html.twig');
    }
}
