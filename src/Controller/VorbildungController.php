<?php

namespace App\Controller;

use App\Entity\Schulbesuch;
use App\Entity\Schule;
use App\Form\SchulbesuchType;
use App\Form\VorbildungType;
use App\Repository\SchulbesuchRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vorbildung")
 */
class VorbildungController extends AbstractController
{
    /**
     * @Route("/", name="vorbildung_index", methods={"GET|POST"})
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
        $form = $this->createForm(VorbildungType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $session->get('registrierung')->getSchueler()->setLetzteSchulart($data['letzteSchulart']);
            $session->get('registrierung')->getSchueler()->setHoechsterAbschluss($data['hoechsterAbschluss']);
            $session->get('registrierung')->getSchueler()->setHoechAbschlAn($data['hoechAbschlAn']);

            return $this->redirectToRoute('allgemein_new');
        }
        return $this->render('vorbildung/index.html.twig', [
            'form' => $form->createView(),
            'schulbesuche' => $session->get('registrierung')->getSchueler()->getSchulbesuche(),
        ]);
    }
}
