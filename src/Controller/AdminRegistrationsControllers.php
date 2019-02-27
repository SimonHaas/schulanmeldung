<?php

namespace App\Controller;

use App\Entity\Registrierung;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminRegistrationsControllers extends AbstractController
{
    /**
     * @Route("/admin/registrations", name="admin_registrations")
     */
    public function index()
    {

        $registrations = $this->getDoctrine()->getRepository(Registrierung::class)->findAll();

        return $this->render('admin_registrations/index.html.twig', [
            'controller_name' => 'AdminRegistrationController',
            'registrations' => $registrations
        ]);
    }

    /**
     * @Route("/admin/registrations/delete/{id}", name="admin_registrations_delete")
     */
    public function delete($id) {
        exit($id);
        return $this->redirectToRoute('admin');
    }

}
