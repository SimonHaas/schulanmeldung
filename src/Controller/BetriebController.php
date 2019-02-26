<?php

namespace App\Controller;

use App\Entity\Betrieb;
use App\Form\BetriebType;
use App\Repository\BetriebRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/betrieb")
 */
class BetriebController extends AbstractController
{
    /**
     * @Route("/", name="betrieb_index", methods="GET")
     */
    public function index(BetriebRepository $betriebRepository): Response
    {
        return $this->render('betrieb/index.html.twig', ['betriebs' => $betriebRepository->findAll()]);
    }

    /**
     * @Route("/new", name="betrieb_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $betrieb = new Betrieb();
        $form = $this->createForm(BetriebType::class, $betrieb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($betrieb);
            $em->flush();

            return $this->redirectToRoute('betrieb_index');
        }

        return $this->render('betrieb/new.html.twig', [
            'betrieb' => $betrieb,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/update", name="betrieb_update", methods="GET|POST")
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $session = $request->getSession();
        $betrieb = $session->get('betrieb');
        $form = $this->createForm(BetriebType::class, $betrieb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('daten_pruefen');
        }

        return $this->render('betrieb/update.html.twig', [
            'betrieb' => $betrieb,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="betrieb_show", methods="GET")
     */
    public function show(Betrieb $betrieb): Response
    {
        return $this->render('betrieb/show.html.twig', ['betrieb' => $betrieb]);
    }

    /**
     * @Route("/{id}/edit", name="betrieb_edit", methods="GET|POST")
     */
    public function edit(Request $request, Betrieb $betrieb): Response
    {
        $form = $this->createForm(BetriebType::class, $betrieb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('betrieb_edit', ['id' => $betrieb->getId()]);
        }

        return $this->render('betrieb/edit.html.twig', [
            'betrieb' => $betrieb,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="betrieb_delete", methods="DELETE")
     */
    public function delete(Request $request, Betrieb $betrieb): Response
    {
        if ($this->isCsrfTokenValid('delete'.$betrieb->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($betrieb);
            $em->flush();
        }

        return $this->redirectToRoute('betrieb_index');
    }
}
