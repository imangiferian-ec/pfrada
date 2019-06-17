<?php

namespace App\Service;

use Doctrine\DBAL\Driver\Connection;

class FunctionPermissionsService
{
    private $conn;

    public function __construct(Connection $conn)
    {
        $this->conn = $conn;
    }

    /**
     * Finds all permitted roles to respective function
     */
    public function getAllFunctionsPermittedRoles() {

        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder->select('permitted_roles, route')
          ->from('roles_function_permissions pl');

        $data = $queryBuilder->execute()->fetchAll();

        return $data;
    }

    /**
     * Finds all primary menu
     */
    public function getAllSideMenu($module_id) {

        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder->select('*')
          ->from('roles_function_permissions pl')
          ->where('pl.is_side_menu = 1 and pl.module_id = '.$module_id);

        $data = $queryBuilder->execute()->fetchAll();

        return $data;
    }

    /**
     * Finds all System Modules
     */
    public function getAllSystemModule() {

        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder->select('*')
          ->from('system_modules sm')
          ->where('sm.is_active = 1')
          ->orderBy('sm.position', 'ASC');

        $data = $queryBuilder->execute()->fetchAll();
        
        return $data;
    }

    /**
     * Count System Modules without active function
     */

    public function getCountModuleFunctions($module_id) {
      $queryBuilder = $this->conn->createQueryBuilder();
      $queryBuilder->select('count(pl.id) as countLink')
        ->from('roles_function_permissions pl')
        ->where('pl.module_id = '.$module_id);

      $data = $queryBuilder->execute()->fetchAll();
      return $data[0]['countLink'];
    }
}
