<?php

namespace App\Controller;

use App\Entity\Ausbildung;
use App\Form\AusbildungType;
use App\Repository\AusbildungRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ausbildung")
 */
class AusbildungController extends AbstractController
{
    /**
     * @Route("/", name="ausbildung_index", methods="GET")
     */
    public function index(AusbildungRepository $ausbildungRepository): Response
    {
        return $this->render('ausbildung/index.html.twig', ['ausbildungs' => $ausbildungRepository->findAll()]);
    }

    /**
     * @Route("/new", name="ausbildung_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $ausbildung = new Ausbildung();
        $form = $this->createForm(AusbildungType::class, $ausbildung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ausbildung);
            $em->flush();

            return $this->redirectToRoute('ausbildung_index');
        }

        return $this->render('ausbildung/new.html.twig', [
            'ausbildung' => $ausbildung,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ausbildung_show", methods="GET")
     */
    public function show(Ausbildung $ausbildung): Response
    {
        return $this->render('ausbildung/show.html.twig', ['ausbildung' => $ausbildung]);
    }

    /**
     * @Route("/{id}/edit", name="ausbildung_edit", methods="GET|POST")
     */
    public function edit(Request $request, Ausbildung $ausbildung): Response
    {
        $form = $this->createForm(AusbildungType::class, $ausbildung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ausbildung_edit', ['id' => $ausbildung->getId()]);
        }

        return $this->render('ausbildung/edit.html.twig', [
            'ausbildung' => $ausbildung,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ausbildung_delete", methods="DELETE")
     */
    public function delete(Request $request, Ausbildung $ausbildung): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ausbildung->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ausbildung);
            $em->flush();
        }

        return $this->redirectToRoute('ausbildung_index');
    }
}
