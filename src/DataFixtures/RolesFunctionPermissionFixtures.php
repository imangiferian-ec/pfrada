<?php

namespace App\DataFixtures;

use App\Entity\RolesFunctionPermission;
use App\DataFixtures\SystemModuleFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RolesFunctionPermissionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

      /*system settings links*/
      $sysIndex = new RolesFunctionPermission();
      $sysIndex->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('Business Types')
        ->setRoute('business_type_index')
        ->setLabel('Business Types')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(1)
        ->setIsActive(1)
        ->setIsSideMenu(1);
      $manager->persist($sysIndex);

      $businessTypeNew = new RolesFunctionPermission();
      $businessTypeNew->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('New Business Types')
        ->setRoute('business_type_new')
        ->setLabel('Add New Business Types')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(2)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($businessTypeNew);

      $showBusinessType = new RolesFunctionPermission();
      $showBusinessType->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('Show Business Types')
        ->setRoute('business_type_show')
        ->setLabel('Show Business Types')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(3)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($showBusinessType);

      $business_type_edit = new RolesFunctionPermission();
      $business_type_edit->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('Edit Business Type')
        ->setRoute('business_type_edit')
        ->setLabel('Edit Business Types')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(4)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($business_type_edit);

      $businessTypeDelete = new RolesFunctionPermission();
      $businessTypeDelete->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('Delete Business Type')
        ->setRoute('business_type_delete')
        ->setLabel('Delete Business Types')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(5)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($businessTypeDelete);

      $facilityList = new RolesFunctionPermission();
      $facilityList->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('Facilities')
        ->setRoute('facility_index')
        ->setLabel('List of Facilities')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(6)
        ->setIsActive(1)
        ->setIsSideMenu(1);
      $manager->persist($facilityList);

      $facilityNew = new RolesFunctionPermission();
      $facilityNew->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('New Facility')
        ->setRoute('facility_new')
        ->setLabel('Add New Facility')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(7)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($facilityNew);

      $facilityShow = new RolesFunctionPermission();
      $facilityShow->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('Facility Details')
        ->setRoute('facility_show')
        ->setLabel('Facility Details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(8)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($facilityShow);

      $facilityEdit = new RolesFunctionPermission();
      $facilityEdit->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('Edit Facility')
        ->setRoute('facility_edit')
        ->setLabel('Edit Facility Details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(9)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($facilityEdit);

      $facilityDelete = new RolesFunctionPermission();
      $facilityDelete->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('Delete Facility')
        ->setRoute('facility_delete')
        ->setLabel('Delete Facility')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(10)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($facilityDelete);

      $clearancePurposeIndex = new RolesFunctionPermission();
      $clearancePurposeIndex->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('Clearance Purposes')
        ->setRoute('clearance_purpose_index')
        ->setLabel('Clearance Purposes')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(11)
        ->setIsActive(1)
        ->setIsSideMenu(1);
      $manager->persist($clearancePurposeIndex);

      $newClearancePurpose = new RolesFunctionPermission();
      $newClearancePurpose->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('New Clearance Purpose')
        ->setRoute('clearance_purpose_new')
        ->setLabel('New Clearance Purpose')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(12)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($newClearancePurpose);

      $showClearancePurpose = new RolesFunctionPermission();
      $showClearancePurpose->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('Clearance Purpose Details')
        ->setRoute('clearance_purpose_show')
        ->setLabel('Clearance Purpose Details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(13)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($showClearancePurpose);

      $editClearancePurpose = new RolesFunctionPermission();
      $editClearancePurpose->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('Edit Clearance Purpose Details')
        ->setRoute('clearance_purpose_edit')
        ->setLabel('Edit Clearance Purpose Details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(14)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($editClearancePurpose);

      $deleteClearancePurpose = new RolesFunctionPermission();
      $deleteClearancePurpose->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_SYSSETTINGS))
        ->setFunctionName('Delete Clearance Purpose Details')
        ->setRoute('clearance_purpose_delete')
        ->setLabel('Delete Clearance Purpose Details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(15)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($deleteClearancePurpose);

      /* Payment Schedule Links*/
      $clearanceFeeIndex = new RolesFunctionPermission();
      $clearanceFeeIndex->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('Brgy Clearance')
        ->setRoute('clearance_fee_index')
        ->setLabel('Barangay Clearance')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(51)
        ->setIsActive(1)
        ->setIsSideMenu(1);
      $manager->persist($clearanceFeeIndex);

      $clearanceFeeNew = new RolesFunctionPermission();
      $clearanceFeeNew->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('New Brgy Clearance Payment')
        ->setRoute('clearance_fee_new')
        ->setLabel('New Brgy Clearance Payment')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(52)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($clearanceFeeNew);

      $clearanceFeeShow = new RolesFunctionPermission();
      $clearanceFeeShow->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('Details of Brgy Clearance Payment')
        ->setRoute('clearance_fee_show')
        ->setLabel('Details of Brgy Clearance Payment Schedule')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(53)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($clearanceFeeShow);

      $clearanceFeeEdit = new RolesFunctionPermission();
      $clearanceFeeEdit->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('Edit Brgy Clearance Payment')
        ->setRoute('clearance_fee_edit')
        ->setLabel('Edit Brgy Clearance Payment Schedule')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(54)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($clearanceFeeEdit);

      $clearanceFeeDelete = new RolesFunctionPermission();
      $clearanceFeeDelete->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('Delete Brgy Clearance Payment')
        ->setRoute('clearance_fee_delete')
        ->setLabel('Delete Brgy Clearance Payment Schedule')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(55)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($clearanceFeeDelete);


      $businessPermitFeeIndex = new RolesFunctionPermission();
      $businessPermitFeeIndex->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('Business Permit')
        ->setRoute('business_permit_fee_index')
        ->setLabel('Business Permit Payment')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(56)
        ->setIsActive(1)
        ->setIsSideMenu(1);
      $manager->persist($businessPermitFeeIndex);

      $businessPermitFeeNew = new RolesFunctionPermission();
      $businessPermitFeeNew->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('New Business Permit Payment')
        ->setRoute('business_permit_fee_new')
        ->setLabel('New Business Permit Payment')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(57)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($businessPermitFeeNew);

      $businessPermitFeeShow = new RolesFunctionPermission();
      $businessPermitFeeShow->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('New Business Permit Payment')
        ->setRoute('business_permit_fee_show')
        ->setLabel('New Business Permit Payment')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(58)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($businessPermitFeeShow);

      $businessPermitFeeEdit = new RolesFunctionPermission();
      $businessPermitFeeEdit->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('Edit Business Permit Payment')
        ->setRoute('business_permit_fee_edit')
        ->setLabel('Edit Business Permit Payment')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(59)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($businessPermitFeeEdit);

      $businessPermitFeeDelete = new RolesFunctionPermission();
      $businessPermitFeeDelete->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('Delete Business Permit Payment')
        ->setRoute('business_permit_fee_delete')
        ->setLabel('Delete Business Permit Payment')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(60)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($businessPermitFeeDelete);

      $reservationFeeIndex = new RolesFunctionPermission();
      $reservationFeeIndex->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('Facility Reservations')
        ->setRoute('reservation_fee_index')
        ->setLabel('Facility Reservations')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(61)
        ->setIsActive(1)
        ->setIsSideMenu(1);
      $manager->persist($reservationFeeIndex);

      $reservationFeeNew = new RolesFunctionPermission();
      $reservationFeeNew->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('New Facility Reservation Payment')
        ->setRoute('reservation_fee_new')
        ->setLabel('New Facility Reservation Payment')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(62)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($reservationFeeNew);

      $reservationFeeShow = new RolesFunctionPermission();
      $reservationFeeShow->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('Facility Reservation Payment Details')
        ->setRoute('reservation_fee_show')
        ->setLabel('Facility Reservation Payment Details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(63)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($reservationFeeShow);

      $reservationFeeEdit = new RolesFunctionPermission();
      $reservationFeeEdit->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('Edit Facility Reservation Payment')
        ->setRoute('reservation_fee_edit')
        ->setLabel('Edit Facility Reservation Payment')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(64)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($reservationFeeEdit);

      $reservationFeeDelete = new RolesFunctionPermission();
      $reservationFeeDelete->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_PS))
        ->setFunctionName('Delete Facility Reservation Payment')
        ->setRoute('reservation_fee_delete')
        ->setLabel('Delete Facility Reservation Payment')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(65)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($reservationFeeDelete);


      /*User management links*/
      $roleIndex = new RolesFunctionPermission();
      $roleIndex->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('Roles')
        ->setRoute('role_index')
        ->setLabel('list of roles')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(101)
        ->setIsActive(1)
        ->setIsSideMenu(1);
      $manager->persist($roleIndex);

      $roleNew = new RolesFunctionPermission();
      $roleNew->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('New Role')
        ->setRoute('role_new')
        ->setLabel('create new roles')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(102)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($roleNew);

      $roleDetails = new RolesFunctionPermission();
      $roleDetails->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('Details')
        ->setRoute('role_show')
        ->setLabel('role details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(103)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($roleDetails);

      $roleEdit = new RolesFunctionPermission();
      $roleEdit->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('Edit Role')
        ->setRoute('role_edit')
        ->setLabel('modify role information')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(104)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($roleEdit);

      $roleDelete = new RolesFunctionPermission();
      $roleDelete->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('Delete Role')
        ->setRoute('role_delete')
        ->setLabel('delete role')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(105)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($roleDelete);

      $permissions = new RolesFunctionPermission();
      $permissions->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('Permissions')
        ->setRoute('roles_function_permission_index')
        ->setLabel('functions permission list')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(106)
        ->setIsActive(1)
        ->setIsSideMenu(1);
      $manager->persist($permissions);

      $permissionShow = new RolesFunctionPermission();
      $permissionShow->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('Function Permissions Details')
        ->setRoute('roles_function_permission_show')
        ->setLabel('functions permission details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(107)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($permissionShow);

      $permissionEdit = new RolesFunctionPermission();
      $permissionEdit->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('Edit Function Permissions')
        ->setRoute('roles_function_permission_edit')
        ->setLabel('modify functions permission details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(108)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($permissionEdit);

      $permissionEditAll = new RolesFunctionPermission();
      $permissionEditAll->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('Edit All Function Permissions')
        ->setRoute('modify_all_pl')
        ->setLabel('modify all functions permission details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(109)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($permissionEditAll);

      $userIndex = new RolesFunctionPermission();
      $userIndex->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('Users')
        ->setRoute('user_index')
        ->setLabel('list of users')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(110)
        ->setIsActive(1)
        ->setIsSideMenu(1);
      $manager->persist($userIndex);

      $myDetails = new RolesFunctionPermission();
      $myDetails->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('Account Details')
        ->setRoute('user_my_details')
        ->setLabel('Account Details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(111)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($myDetails);

      $newUser = new RolesFunctionPermission();
      $newUser->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('New User')
        ->setRoute('user_new')
        ->setLabel('create new user')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(112)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($newUser);

      $userDetails = new RolesFunctionPermission();
      $userDetails->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('User Details')
        ->setRoute('user_show')
        ->setLabel('user details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(113)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($userDetails);

      $myAccountDetails = new RolesFunctionPermission();
      $myAccountDetails->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('My Account Details')
        ->setRoute('user_my_details')
        ->setLabel('my account details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(114)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($myAccountDetails);

      $userEdit = new RolesFunctionPermission();
      $userEdit->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('Edit User')
        ->setRoute('user_edit')
        ->setLabel('modify user information')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(115)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($userEdit);

      $userDelete = new RolesFunctionPermission();
      $userDelete->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_UM))
        ->setFunctionName('Delete User')
        ->setRoute('user_delete')
        ->setLabel('delete user information')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(116)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($userDelete);

      /* citizen management links*/
      $citizenIndex = new RolesFunctionPermission();
      $citizenIndex->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_CM))
        ->setFunctionName('Citizens')
        ->setRoute('citizen_index')
        ->setLabel('list of citizens')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(201)
        ->setIsActive(1)
        ->setIsSideMenu(1);
      $manager->persist($citizenIndex);

      $citizenAdd = new RolesFunctionPermission();
      $citizenAdd->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_CM))
        ->setFunctionName('Add Citizen')
        ->setRoute('citizen_new')
        ->setLabel('add new citizen')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(202)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($citizenAdd);

      $citizenDetails = new RolesFunctionPermission();
      $citizenDetails->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_CM))
        ->setFunctionName('Add Citizen')
        ->setRoute('citizen_show')
        ->setLabel('citizen information details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(203)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($citizenDetails);

      $citizenEdit = new RolesFunctionPermission();
      $citizenEdit->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_CM))
        ->setFunctionName('Edit Citizen')
        ->setRoute('citizen_edit')
        ->setLabel('edit citizen information')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(204)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($citizenEdit);

      $citizenDelete = new RolesFunctionPermission();
      $citizenDelete->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_CM))
        ->setFunctionName('Delete Citizen')
        ->setRoute('citizen_delete')
        ->setLabel('delete citizen information')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(205)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($citizenDelete);

      /*corporation management*/
      $corpList = new RolesFunctionPermission();
      $corpList->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_CORPS))
        ->setFunctionName('Corporations')
        ->setRoute('corporation_index')
        ->setLabel('list of corporations')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(301)
        ->setIsActive(1)
        ->setIsSideMenu(1);
      $manager->persist($corpList);

      $corpNew = new RolesFunctionPermission();
      $corpNew->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_CORPS))
        ->setFunctionName('Create New Corporation')
        ->setRoute('corporation_new')
        ->setLabel('add new corporation')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(302)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($corpNew);

      $corpDetails = new RolesFunctionPermission();
      $corpDetails->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_CORPS))
        ->setFunctionName('Show Corporation Details')
        ->setRoute('corporation_show')
        ->setLabel('corporate details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(303)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($corpDetails);

      $editCorp = new RolesFunctionPermission();
      $editCorp->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_CORPS))
        ->setFunctionName('Edit Corporation Details')
        ->setRoute('corporation_edit')
        ->setLabel('edit corporate details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(304)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($editCorp);

      $corpDelete = new RolesFunctionPermission();
      $corpDelete->setModule($this->getReference(SystemModuleFixtures::SYSTEM_MODULE_CORPS))
        ->setFunctionName('Delete Corporate Details')
        ->setRoute('corporation_delete')
        ->setLabel('delete corporate details')
        ->setPermittedRoles(['ROLE_ADMIN'])
        ->setPosition(305)
        ->setIsActive(1)
        ->setIsSideMenu(0);
      $manager->persist($corpDelete);

      $manager->flush();
    }

    public function getDependencies()
    {
      return array(
        SystemModuleFixtures::class,
      );
    }
}
