<?php

namespace App\Controller;

use App\Form\BasicInfosType;
use App\Form\BetriebSelectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnmeldungController extends AbstractController
{
    /**
     * @Route("/anmeldung", name="anmeldung")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function index(Request $request)
    {
        $form = $this->createForm(BasicInfosType::class);


        $form->handleRequest($request);

        //TODO for isValid add Annotations in Entity
        if ($form->isSubmitted() && $form->isValid()) {
            //$entityManager = $this->getDoctrine()->getManager();
            //$entityManager->persist($post);
            //$entityManager->flush();

            //return $this->redirectToRoute('admin_post_show', [
            //    'id' => $post->getId()
            //]);

            return $this->redirectToRoute('betrieb.select');
        }


        return $this->render('anmeldung/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("betriebsauswahl", name="betrieb.select")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function betriebSelect(Request $request)
    {
        $form = $this->createForm(BetriebSelectType::class);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$entityManager = $this->getDoctrine()->getManager();
            //$entityManager->persist($post);
            //$entityManager->flush();

            //return $this->redirectToRoute('admin_post_show', [
            //    'id' => $post->getId()
            //]);

            return $this->redirectToRoute('schuelerdaten');
        }

        return $this->render('anmeldung/betriebSelect.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("schuelerdaten", name="schuelerdaten")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function schuelerdaten(Request $request)
    {
        $form = $this->createForm(BetriebSelectType::class);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$entityManager = $this->getDoctrine()->getManager();
            //$entityManager->persist($post);
            //$entityManager->flush();

            //return $this->redirectToRoute('admin_post_show', [
            //    'id' => $post->getId()
            //]);

            return $this->redirectToRoute('betrieb.select');
        }

        return $this->render('anmeldung/schuelerdaten.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("betrieb", name="betrieb")
     * @param Request $request
     * @return Response
     */
    public function newBetrieb(Request $request)
    {
        return $this->render('anmeldung/newBetrieb.html.twig');
    }

}
