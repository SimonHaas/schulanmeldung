<?php

namespace App\Controller;

use App\Entity\Registrierung;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AdminRegistrationsControllers extends AbstractController
{
    /**
     * @Route("/registrations", name="admin_registrations")
     */
    public function index()
    {

        $registrations = $this->getDoctrine()->getRepository(Registrierung::class)->findForExport();

        return $this->render('admin_registrations/index.html.twig', [
            'controller_name' => 'AdminRegistrationController',
            'registrations' => $registrations
        ]);
    }

    /**
     * @Route("/registration/{id}", name="registration_delete", methods="DELETE")
     * @param Request $request
     * @param Registrierung $registrierung
     * @return Response
     */
    public function delete(Request $request, Registrierung $registrierung): Response
    {
        if ($this->isCsrfTokenValid('delete'.$registrierung->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($registrierung);
            $em->flush();
        }

        return $this->redirectToRoute('admin');
    }

}
