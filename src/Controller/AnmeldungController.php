<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
