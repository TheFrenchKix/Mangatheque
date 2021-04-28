<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new Utilisateur();

        $user->setUsername("Zebi");
        $user->setPassword($this->encoder->encodePassword($user, "mouche"));
        $user->setRoles(["ROLE_ADMIN"]);
        $manager->persist($user);

        $user2 = new Utilisateur();

        $user2->setUsername("Moi");
        $user2->setPassword($this->encoder->encodePassword($user, "test"));
        $user2->setRoles(["ROLE_USER"]);
        $manager->persist($user2);

        $manager->flush();
    }
}
