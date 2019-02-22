<?php

namespace App\Controller;

use App\Entity\Registrierung;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminRegistrationController extends AbstractController
{
    /**
     * @Route("/admin/registration", name="admin_registration")
     */
    public function index()
    {

        $registrations = $this->getDoctrine()->getRepository(Registrierung::class)->findAll();

        return $this->render('admin_registration/index.html.twig', [
            'controller_name' => 'AdminRegistrationController',
            'registrations' => $registrations
        ]);
    }
}
