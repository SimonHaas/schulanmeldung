<?php
namespace App\Controller;

use App\Entity\Umschueler;
use App\Form\UmschuelerType;
use App\Repository\UmschuelerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/umschueler")
 */
class UmschuelerController extends AbstractController
{

    /**
     * @Route("/index", name="umschueler_index", methods="GET")
     */
    public function view(UmschuelerRepository $umschuelerRepository): Response
    {
        return $this->render('umschueler/index.html.twig', ['umschuelers' => $umschuelerRepository->findAll()]);
    }
    /**
     * @Route("/", name="umschueler_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        if($request->hasSession() && $request->getSession()->has('registrierung')) {
            $session = $request->getSession();
        } else {
            if($request->hasSession()) {
                $request->getSession()->invalidate();
            }
            return $this->redirectToRoute('anmeldung_start');
        }
        if($session->has('umschueler')) {
            $umschueler = $session->get('umschueler');
        } else {
            $umschueler = new Umschueler();
        }

        $form = $this->createForm(UmschuelerType::class, $umschueler);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $schueler = $session->get('schueler');
            $umschueler = $form->getData();
            $schueler->setUmschueler($umschueler);
            $umschueler->setSchueler($schueler);
            $session->set('schueler', $schueler);
            $session->set('umschueler', $umschueler);
            return $this->redirectToRoute('schueler_new');
        }
        return $this->render('umschueler/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/update", name="umschueler_update", methods="GET|POST")
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $session = $request->getSession();
        $umschueler = $session->get('umschueler');
        $form = $this->createForm(UmschuelerType::class, $umschueler);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('daten_pruefen');
        }
        return $this->render('umschueler/update.html.twig', [
            'umschueler' => $umschueler,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{id}", name="umschueler_show", methods="GET")
     */
    public function show(Umschueler $umschueler): Response
    {
        return $this->render('umschueler/show.html.twig', ['umschueler' => $umschueler]);
    }
    /**
     * @Route("/{id}/edit", name="umschueler_edit", methods="GET|POST")
     */
    public function edit(Request $request, Umschueler $umschueler): Response
    {
        $form = $this->createForm(UmschuelerType::class, $umschueler);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('umschueler_edit', ['id' => $umschueler->getId()]);
        }
        return $this->render('umschueler/edit.html.twig', [
            'umschueler' => $umschueler,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{id}", name="umschueler_delete", methods="DELETE")
     */
    public function delete(Request $request, Umschueler $umschueler): Response
    {
        if ($this->isCsrfTokenValid('delete'.$umschueler->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($umschueler);
            $em->flush();
        }
        return $this->redirectToRoute('umschueler_view');
    }
}