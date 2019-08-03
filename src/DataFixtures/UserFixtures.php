<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class UserFixtures extends Fixture
{
    public $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('labitty189@outlook.fr');
        $user->setPassword($this->passwordEncoder->encodePassword( $user, 'labitty'));
        $user->setUpdatedAt(new \Datetime());
        $user->setProfile('SuperAdmin');
        $user->setRoles(["ROLE_SUPER_ADMIN"]);
        $user->setStatut('BLOQUER');
        $user->setImageName('image.png');
        $manager->persist($user);
        $manager->flush();
    }
}
