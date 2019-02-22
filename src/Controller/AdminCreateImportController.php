<?php

namespace App\Controller;

use App\Entity\Registrierung;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminCreateImportController extends AbstractController
{
    /**
     * @Route("/admin/create/import", name="admin_create_import")
     */
    public function index()
    {
        $doctrineRegistrations = $this->getDoctrine()->getRepository(Registrierung::class)->findAll();

        $mappedRegistrations = array();

        /** @var Registrierung $registration */
        foreach ($doctrineRegistrations as $registration) {
            $schueler = $registration->getSchueler();

            array_push($doctrineRegistrations, array(

            ));
        }

        $test = 'hi';

        return $this->render('admin_create_import/index.html.twig', [
            'controller_name' => 'AdminCreateImportController',
            'test' => $this->getContent()
        ]);
    }

    public function getContent() {
        return file_get_contents($this->get('kernel')->getRootDir() . '/export-template.txt');
    }

}
