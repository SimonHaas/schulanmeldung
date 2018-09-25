<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SchuelerType;

class SchuelerTestController extends AbstractController
{
    /**
     * @Route("/schueler/test", name="schueler_test")
     */
    public function index()
    {
        $form = $this->createForm(SchuelerType::class);

        return $this->render('schueler_test/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
