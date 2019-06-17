<?php

namespace App\Repository;

use App\Entity\RolesFunctionPermission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RolesFunctionPermission|null find($id, $lockMode = null, $lockVersion = null)
 * @method RolesFunctionPermission|null findOneBy(array $criteria, array $orderBy = null)
 * @method RolesFunctionPermission[]    findAll()
 * @method RolesFunctionPermission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RolesFunctionPermissionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RolesFunctionPermission::class);
    }

    // /**
    //  * @return RolesFunctionPermission[] Returns an array of RolesFunctionPermission objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RolesFunctionPermission
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
