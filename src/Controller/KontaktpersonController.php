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
     * @Route("/", name="kontaktperson_index", methods="GET")
     */
    public function index(KontaktpersonRepository $kontaktpersonRepository): Response
    {
        return $this->render('kontaktperson/index.html.twig', ['kontaktpeople' => $kontaktpersonRepository->findAll()]);
    }

    /**
     * @Route("/new", name="kontaktperson_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $kontaktperson = new Kontaktperson();
        $form = $this->createForm(KontaktpersonType::class, $kontaktperson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kontaktperson);
            $em->flush();

            return $this->redirectToRoute('kontaktperson_index');
        }

        return $this->render('kontaktperson/new.html.twig', [
            'kontaktperson' => $kontaktperson,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/update", name="kontaktperson_update", methods="GET|POST")
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $session = $request->getSession();
        $kontaktperson = $session->get('kontaktperson');
        $form = $this->createForm(KontaktpersonType::class, $kontaktperson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('daten_pruefen');
        }

        return $this->render('kontaktperson/update.html.twig', [
            'kontaktperson' => $kontaktperson,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kontaktperson_show", methods="GET")
     */
    public function show(Kontaktperson $kontaktperson): Response
    {
        return $this->render('kontaktperson/show.html.twig', ['kontaktperson' => $kontaktperson]);
    }

    /**
     * @Route("/{id}/edit", name="kontaktperson_edit", methods="GET|POST")
     */
    public function edit(Request $request, Kontaktperson $kontaktperson): Response
    {
        $form = $this->createForm(KontaktpersonType::class, $kontaktperson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kontaktperson_edit', ['id' => $kontaktperson->getId()]);
        }

        return $this->render('kontaktperson/edit.html.twig', [
            'kontaktperson' => $kontaktperson,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kontaktperson_delete", methods="DELETE")
     */
    public function delete(Request $request, Kontaktperson $kontaktperson): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kontaktperson->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($kontaktperson);
            $em->flush();
        }

        return $this->redirectToRoute('kontaktperson_index');
    }
}
