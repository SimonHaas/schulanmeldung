<?php

namespace App\Controller;

use App\Entity\Ausbildung;
use App\Entity\Betrieb;
use App\Form\AusbildungType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AusbildungController
 * @package App\Controller
 * @Route("/ausbildung")
 */
class AusbildungController extends AbstractController
{
    /**
     * @Route("/neu", name="ausbildung_new")
     */
    public function new(Request $request)
    {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }

        $ausbildung = new Ausbildung();
        $betriebeRepo = $this->getDoctrine()->getRepository(Betrieb::class);
        $betriebe[] = $betriebeRepo->findBy(['istVerifiziert'=>true]);

        if($session->has('betrieb')) {
            $betriebNeu = $session->get('betrieb');
            $this->getDoctrine()->getManager()->persist($betriebNeu);
            $betriebe[] = $betriebNeu;
        } else {
            $betriebNeu = null;
        }

        $form = $this->createForm(AusbildungType::class, $ausbildung, ['betriebe' => $betriebe, 'betriebNeu' => $betriebNeu]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if($session->has('betrieb')) {
                $session->remove('betrieb');
            }
            $ausbildung = $form->getData();
            $session->get('registrierung')->getSchueler()->setAusbildung($ausbildung);
            return $this->redirectToRoute('schueler_new');
        }
        return $this->render('ausbildung/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
