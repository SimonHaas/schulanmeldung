<?php

namespace App\Controller;

use App\Entity\Kontaktperson;
use App\Form\KontaktpersonType;
use App\Repository\KontaktpersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/kontaktperson")
 */
class KontaktpersonController extends AbstractController
{
    /**
     * @Route("/", name="kontaktperson_index", methods={"GET"})
     */
    public function index(Request $request): Response
    {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }
        return $this->render('kontaktperson/index.html.twig', [
            'kontaktpeople' => $session->get('registrierung')->getSchueler()->getKontaktpersonen(),
        ]);
    }

    /**
     * @Route("/neu", name="kontaktperson_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {

        $kontaktperson = new Kontaktperson();
        $form = $this->createForm(KontaktpersonType::class, $kontaktperson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if($request->hasSession() && $request->getSession()->has('registrierung')) {
                $session = $request->getSession();
            } else {
                if($request->hasSession()) {
                    $request->getSession()->invalidate();
                }
                return $this->redirectToRoute('anmeldung_start');
            }
            $session->get('registrierung')->getSchueler()->addKontaktperson($form->getData());

            return $this->redirectToRoute('kontaktperson_index');
        }

        return $this->render('kontaktperson/new.html.twig', [
            'kontaktperson' => $kontaktperson,
            'form' => $form->createView(),
        ]);
    }
}
