<?php

namespace App\Controller;

use App\Form\BasicInfosType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnmeldungController extends AbstractController
{
    /**
     * @Route("/anmeldung", name="anmeldung")
     */
    public function index()
    {
        $form = $this->createForm(BasicInfosType::class);

        return $this->render('anmeldung/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
