<?php

namespace App\DataFixtures;

use App\Entity\AdminUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminUserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        $user = new AdminUser(1);
        $user->setEmail('admin@bs1-bt.de');
        $user->setRoles($user->getRoles());

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user, 'test123'
        ));

        $manager->persist($user);
        $manager->flush();
    }


}
