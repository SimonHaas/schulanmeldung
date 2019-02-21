<?php

namespace App\Controller;

use App\Entity\Schule;
use App\Form\SchuleType;
use App\Repository\SchuleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/schule")
 */
class SchuleController extends AbstractController
{
    /**
     * @Route("/", name="schule_index", methods="GET")
     */
    public function index(SchuleRepository $schuleRepository): Response
    {
        return $this->render('schule/index.html.twig', ['schules' => $schuleRepository->findAll()]);
    }

    /**
     * @Route("/new", name="schule_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $schule = new Schule();
        $form = $this->createForm(SchuleType::class, $schule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($schule);
            $em->flush();

            return $this->redirectToRoute('schule_index');
        }

        return $this->render('schule/new.html.twig', [
            'schule' => $schule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="schule_show", methods="GET")
     */
    public function show(Schule $schule): Response
    {
        return $this->render('schule/show.html.twig', ['schule' => $schule]);
    }

    /**
     * @Route("/{id}/edit", name="schule_edit", methods="GET|POST")
     */
    public function edit(Request $request, Schule $schule): Response
    {
        $form = $this->createForm(SchuleType::class, $schule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('schule_edit', ['id' => $schule->getId()]);
        }

        return $this->render('schule/edit.html.twig', [
            'schule' => $schule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="schule_delete", methods="DELETE")
     */
    public function delete(Request $request, Schule $schule): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schule->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($schule);
            $em->flush();
        }

        return $this->redirectToRoute('schule_index');
    }
}
