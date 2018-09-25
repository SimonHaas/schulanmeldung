<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SchuelerTestController extends AbstractController
{
    /**
     * @Route("/schueler/test", name="schueler_test")
     */
    public function index()
    {
        return $this->render('schueler_test/index.html.twig', [
            'controller_name' => 'SchuelerTestController',
        ]);
    }
}
