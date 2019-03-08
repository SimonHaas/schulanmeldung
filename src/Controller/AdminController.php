<?php

namespace App\Controller;

use App\Entity\AdminUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/user")
     */
    public function user(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new AdminUser();
        $user->setEmail(getenv('ADMIN_EMAIL'));
        $user->setRoles($user->getRoles());

        $user->setPassword($passwordEncoder->encodePassword(
            $user, getenv('ADMIN_PASSWORD')
        ));

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($user);
        $manager->flush();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
