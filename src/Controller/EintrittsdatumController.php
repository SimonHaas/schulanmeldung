<?php

namespace App\Controller;

use App\Form\EintrittsdatumType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/eintrittsdatum")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class EintrittsdatumController extends AbstractController
{
    /**
     * @Route("/", name="eintrittsdatum")
     */
    public function index(): Response
    {
        $eintrittErsteHaelfte = getenv('EINTRITTSDATUM_ERSTE_HAELFTE');
        $eintrittZweiteHaelfte = getenv('EINTRITTSDATUM_ZWEITE_HAELFTE');

        return $this->render('eintrittsdatum/index.html.twig', [
            'ersteHaelte' => $eintrittErsteHaelfte,
            'zweiteHaelfte' => $eintrittZweiteHaelfte
        ]);
    }

    /**
     * @Route("/edit", name="eintrittsdatum_edit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request): Response
    {
        $form = $this->createForm(EintrittsdatumType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->changeEnv('EINTRITTSDATUM_ERSTE_HAELFTE', $form->get('ersteHaelfte')->getViewData());
            $this->changeEnv('EINTRITTSDATUM_ZWEITE_HAELFTE', $form->get('zweiteHaelfte')->getViewData());

            return $this->redirectToRoute('eintrittsdatum');
        }

        return $this->render('eintrittsdatum/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public static function changeEnv($key,$value)
    {
        $path = APPLICATION_PATH . '/.env';

        if(is_bool(getenv($key)))
        {
            $old = getenv($key)? 'true' : 'false';
        }
        elseif(getenv($key)===null){
            $old = 'null';
        }
        else{
            $old = getenv($key);
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=".$old, "$key=".$value, file_get_contents($path)
            ));
        }
    }
}
