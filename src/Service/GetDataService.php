<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

class GetDataService{

    protected $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    public function fetch($entityClass) {
        return $this->em->getRepository($entityClass)->findAll();
    }
}
