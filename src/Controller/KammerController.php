<?php

namespace App\Controller;

use App\Entity\Kammer;
use App\Form\KammerType;
use App\Repository\KammerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/kammer")
 */
class KammerController extends AbstractController
{
    /**
     * @Route("/", name="kammer_index", methods="GET")
     */
    public function index(KammerRepository $kammerRepository): Response
    {
        return $this->render('kammer/index.html.twig', ['kammers' => $kammerRepository->findAll()]);
    }

    /**
     * @Route("/new", name="kammer_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $kammer = new Kammer();
        $form = $this->createForm(KammerType::class, $kammer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kammer);
            $em->flush();

            return $this->redirectToRoute('kammer_index');
        }

        return $this->render('kammer/new.html.twig', [
            'kammer' => $kammer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kammer_show", methods="GET")
     */
    public function show(Kammer $kammer): Response
    {
        return $this->render('kammer/show.html.twig', ['kammer' => $kammer]);
    }

    /**
     * @Route("/{id}/edit", name="kammer_edit", methods="GET|POST")
     */
    public function edit(Request $request, Kammer $kammer): Response
    {
        $form = $this->createForm(KammerType::class, $kammer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kammer_edit', ['id' => $kammer->getId()]);
        }

        return $this->render('kammer/edit.html.twig', [
            'kammer' => $kammer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kammer_delete", methods="DELETE")
     */
    public function delete(Request $request, Kammer $kammer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kammer->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($kammer);
            $em->flush();
        }

        return $this->redirectToRoute('kammer_index');
    }
}
