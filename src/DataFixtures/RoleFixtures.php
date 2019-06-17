<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $roleAdmin = new Role();

      $roleAdmin->setName('ROLE_ADMIN')
              ->setDescription('This is for the Admin Role')
              ->setIsActive(1);
      $manager->persist($roleAdmin);

      $roleUser = new Role();
      $roleUser->setName('ROLE_USER')
              ->setDescription('This is for the User Role')
              ->setIsActive(1);
      $manager->persist($roleUser);

      $manager->flush();
    }
}
