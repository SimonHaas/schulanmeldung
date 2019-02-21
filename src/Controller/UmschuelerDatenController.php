<?php

namespace App\Controller;

use App\Entity\UmschuelerDaten;
use App\Form\UmschuelerDatenType;
use App\Repository\UmschuelerDatenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/umschueler/daten")
 */
class UmschuelerDatenController extends AbstractController
{
    /**
     * @Route("/", name="umschueler_daten_index", methods="GET")
     */
    public function index(UmschuelerDatenRepository $umschuelerDatenRepository): Response
    {
        return $this->render('umschueler_daten/index.html.twig', ['umschueler_datens' => $umschuelerDatenRepository->findAll()]);
    }

    /**
     * @Route("/new", name="umschueler_daten_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $umschuelerDaten = new UmschuelerDaten();
        $form = $this->createForm(UmschuelerDatenType::class, $umschuelerDaten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($umschuelerDaten);
            $em->flush();

            return $this->redirectToRoute('umschueler_daten_index');
        }

        return $this->render('umschueler_daten/new.html.twig', [
            'umschueler_daten' => $umschuelerDaten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="umschueler_daten_show", methods="GET")
     */
    public function show(UmschuelerDaten $umschuelerDaten): Response
    {
        return $this->render('umschueler_daten/show.html.twig', ['umschueler_daten' => $umschuelerDaten]);
    }

    /**
     * @Route("/{id}/edit", name="umschueler_daten_edit", methods="GET|POST")
     */
    public function edit(Request $request, UmschuelerDaten $umschuelerDaten): Response
    {
        $form = $this->createForm(UmschuelerDatenType::class, $umschuelerDaten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('umschueler_daten_edit', ['id' => $umschuelerDaten->getId()]);
        }

        return $this->render('umschueler_daten/edit.html.twig', [
            'umschueler_daten' => $umschuelerDaten,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="umschueler_daten_delete", methods="DELETE")
     */
    public function delete(Request $request, UmschuelerDaten $umschuelerDaten): Response
    {
        if ($this->isCsrfTokenValid('delete'.$umschuelerDaten->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($umschuelerDaten);
            $em->flush();
        }

        return $this->redirectToRoute('umschueler_daten_index');
    }
}
