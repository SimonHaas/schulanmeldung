<?php

namespace App\Controller;

use App\Entity\Registrierung;
use App\Form\RegistrierungType;
use App\Repository\RegistrierungRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/registrierung")
 */
class RegistrierungController extends AbstractController
{
    /**
     * @Route("/", name="registrierung_index", methods="GET")
     */
    public function index(RegistrierungRepository $registrierungRepository): Response
    {
        return $this->render('registrierung/index.html.twig', ['registrierungs' => $registrierungRepository->findAll()]);
    }

    /**
     * @Route("/new", name="registrierung_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $registrierung = new Registrierung();
        $form = $this->createForm(RegistrierungType::class, $registrierung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($registrierung);
            $em->flush();

            return $this->redirectToRoute('registrierung_index');
        }

        return $this->render('registrierung/new.html.twig', [
            'registrierung' => $registrierung,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="registrierung_show", methods="GET")
     */
    public function show(Registrierung $registrierung): Response
    {
        return $this->render('registrierung/show.html.twig', ['registrierung' => $registrierung]);
    }

    /**
     * @Route("/{id}/edit", name="registrierung_edit", methods="GET|POST")
     */
    public function edit(Request $request, Registrierung $registrierung): Response
    {
        $form = $this->createForm(RegistrierungType::class, $registrierung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('registrierung_edit', ['id' => $registrierung->getId()]);
        }

        return $this->render('registrierung/edit.html.twig', [
            'registrierung' => $registrierung,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="registrierung_delete", methods="DELETE")
     */
    public function delete(Request $request, Registrierung $registrierung): Response
    {
        if ($this->isCsrfTokenValid('delete'.$registrierung->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($registrierung);
            $em->flush();
        }

        return $this->redirectToRoute('registrierung_index');
    }
}
