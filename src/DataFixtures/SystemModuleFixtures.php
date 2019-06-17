<?php

namespace App\DataFixtures;

use App\Entity\SystemModule;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SystemModuleFixtures extends Fixture
{
    public const SYSTEM_MODULE_UM = 'user management';
    public const SYSTEM_MODULE_PS = 'payment schedules';
    public const SYSTEM_MODULE_CM = 'citizen management';
    public const SYSTEM_MODULE_SYSSETTINGS = 'system settings';
    public const SYSTEM_MODULE_CORPS = 'corporations';

    public function load(ObjectManager $manager)
    {
      $systemSettings = new SystemModule();
      $systemSettings->setModuleName('system settings')
      ->setDescription('module for system wide settings')
      ->setAllowedRoles(["ROLE_ADMIN"])
      ->setPosition(1)
      ->setIsActive(1);
      $manager->persist($systemSettings);

      $paymentSchedules = new SystemModule();
      $paymentSchedules->setModuleName('payment schedules')
              ->setDescription('module for managing payment schedules')
              ->setAllowedRoles(["ROLE_ADMIN"])
              ->setPosition(2)
              ->setIsActive(1);
      $manager->persist($paymentSchedules);

      $userManagement = new SystemModule();
      $userManagement->setModuleName('user management')
              ->setDescription('module for managing user related functionality')
              ->setAllowedRoles(["ROLE_ADMIN"])
              ->setPosition(3)
              ->setIsActive(1);
      $manager->persist($userManagement);

      $citizenManagement = new SystemModule();
      $citizenManagement->setModuleName('citizen management')
              ->setDescription('module for managing citizens')
              ->setAllowedRoles(["ROLE_ADMIN"])
              ->setPosition(4)
              ->setIsActive(1);
      $manager->persist($citizenManagement);

      $corporations = new SystemModule();
      $corporations->setModuleName('corporation management')
              ->setDescription('module for managing corporations')
              ->setAllowedRoles(["ROLE_ADMIN"])
              ->setPosition(5)
              ->setIsActive(1);
      $manager->persist($corporations);

      $manager->flush();
      $this->addReference(self::SYSTEM_MODULE_CM, $citizenManagement);
      $this->addReference(self::SYSTEM_MODULE_UM, $userManagement);
      $this->addReference(self::SYSTEM_MODULE_SYSSETTINGS, $systemSettings);
      $this->addReference(self::SYSTEM_MODULE_CORPS, $corporations);
      $this->addReference(self::SYSTEM_MODULE_PS, $paymentSchedules);
    }
}
