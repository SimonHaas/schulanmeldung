<?php

namespace App\Controller;

use App\Entity\Beruf;
use App\Form\BerufType;
use App\Repository\BerufRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/beruf")
 */
class BerufController extends AbstractController
{
    /**
     * @Route("/", name="beruf_index", methods="GET")
     */
    public function index(BerufRepository $berufRepository): Response
    {
        return $this->render('beruf/index.html.twig', ['berufs' => $berufRepository->findAll()]);
    }

    /**
     * @Route("/new", name="beruf_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $beruf = new Beruf();
        $form = $this->createForm(BerufType::class, $beruf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($beruf);
            $em->flush();

            return $this->redirectToRoute('beruf_index');
        }

        return $this->render('beruf/new.html.twig', [
            'beruf' => $beruf,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="beruf_show", methods="GET")
     */
    public function show(Beruf $beruf): Response
    {
        return $this->render('beruf/show.html.twig', ['beruf' => $beruf]);
    }

    /**
     * @Route("/{id}/edit", name="beruf_edit", methods="GET|POST")
     */
    public function edit(Request $request, Beruf $beruf): Response
    {
        $form = $this->createForm(BerufType::class, $beruf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('beruf_edit', ['id' => $beruf->getId()]);
        }

        return $this->render('beruf/edit.html.twig', [
            'beruf' => $beruf,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="beruf_delete", methods="DELETE")
     */
    public function delete(Request $request, Beruf $beruf): Response
    {
        if ($this->isCsrfTokenValid('delete'.$beruf->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($beruf);
            $em->flush();
        }

        return $this->redirectToRoute('beruf_index');
    }
}
