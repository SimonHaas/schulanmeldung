<?php

namespace App\Controller;

use App\Entity\Schulbesuch;
use App\Form\SchulbesuchType;
use App\Repository\SchulbesuchRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/schulbesuch")
 */
class SchulbesuchController extends AbstractController
{
    /**
     * @Route("/", name="schulbesuch_index", methods="GET")
     */
    public function index(SchulbesuchRepository $schulbesuchRepository): Response
    {
        return $this->render('schulbesuch/index.html.twig', ['schulbesuches' => $schulbesuchRepository->findAll()]);
    }

    /**
     * @Route("/new", name="schulbesuch_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $schulbesuch = new Schulbesuch();
        $form = $this->createForm(SchulbesuchType::class, $schulbesuch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($schulbesuch);
            $em->flush();

            return $this->redirectToRoute('schulbesuch_index');
        }

        return $this->render('schulbesuch/new.html.twig', [
            'schulbesuch' => $schulbesuch,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="schulbesuch_show", methods="GET")
     */
    public function show(Schulbesuch $schulbesuch): Response
    {
        return $this->render('schulbesuch/show.html.twig', ['schulbesuch' => $schulbesuch]);
    }

    /**
     * @Route("/{id}/edit", name="schulbesuch_edit", methods="GET|POST")
     */
    public function edit(Request $request, Schulbesuch $schulbesuch): Response
    {
        $form = $this->createForm(SchulbesuchType::class, $schulbesuch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('schulbesuch_edit', ['id' => $schulbesuch->getId()]);
        }

        return $this->render('schulbesuch/edit.html.twig', [
            'schulbesuch' => $schulbesuch,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="schulbesuch_delete", methods="DELETE")
     */
    public function delete(Request $request, Schulbesuch $schulbesuch): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schulbesuch->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($schulbesuch);
            $em->flush();
        }

        return $this->redirectToRoute('schulbesuch_index');
    }
}
