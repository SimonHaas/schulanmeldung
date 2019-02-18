<?php

namespace App\Controller;

use App\Entity\Betrieb;
use App\Entity\Herkunftsschule;
use App\Entity\Schueler;
use App\Form\BasicInfosType;
use App\Form\BetriebSelectType;
use App\Form\BetriebType;
use App\Form\SchuelerType;
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
        //TODO als Startseite umbauen
        /**
         * @var $pastSchools Herkunftsschule[]
         */
        $pastSchools = $this->getDoctrine()
            ->getRepository(Herkunftsschule::class)
            ->findAll();

        $selectOptions = array();
        foreach($pastSchools as $pastSchool) {
            $selectString = $pastSchool->getOrt().': '.$pastSchool->getName().', '.$pastSchool->getStrasse();
            $selectValue = $pastSchool->getId();
            $selectOptions[$selectString] = $selectValue;
        }

        $form = $this->createForm(BasicInfosType::class, $selectOptions);
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
        /**
         * @var $companies Betrieb[]
         */
        $companies = $this->getDoctrine()
            ->getRepository(Betrieb::class)
            ->findAll();

        //TODO Auswahl in SchuelerType
        $selectOptions = array();
        foreach($companies as $company) {
            $selectString = $company->getName1().' '.$company->getName2().' '.$company->getName3().', '.$company->getStrasse().', '.$company->getPlz().' '.$company->getOrt();
            $selectValue = $company->getSchluessel();
            $selectOptions[$selectString] = $selectValue;
        }

        $form = $this->createForm(BetriebSelectType::class, $selectOptions);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //TODO Betrieb vielleicht in Session speicher oder irgendwie mit Schueler verknüpfen
            //$entityManager = $this->getDoctrine()->getManager();
            //$entityManager->persist($post);
            //$entityManager->flush();

            //return $this->redirectToRoute('admin_post_show', [
            //    'id' => $post->getId()
            //]);

            return $this->redirectToRoute('schueler');
        }

        return $this->render('anmeldung/betriebSelect.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("betrieb", name="betrieb")
     * @param Request $request
     * @return Response
     */
    public function betrieb(Request $request)
    {
        $form = $this->createForm(BetriebType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var $betrieb Betrieb
             */
            $betrieb = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($betrieb);
            $entityManager->flush();

            return $this->redirectToRoute('schueler');
        }

        return $this->render('anmeldung/betrieb.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("schueler", name="schueler")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function schueler(Request $request)
    {
        $form = $this->createForm(SchuelerType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var $schueler Schueler
             */
            $schueler = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($schueler);
            $entityManager->flush();

            //TODO CSV generieren

            return $this->redirectToRoute('datenschutz');
        }

        return $this->render('anmeldung/schueler.html.twig', array(
            'form' => $form->createView(),
        ));
    }



    /**
     * @Route("datenschutz", name="datenschutz")
     * @param Request $request
     * @return Response
     */
    public function datenschutz(Request $request)
    {
        return $this->render('anmeldung/datenschutz.html.twig');
    }
}
