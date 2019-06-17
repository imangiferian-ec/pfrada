<?php

namespace App\Repository;

use App\Entity\SystemModule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SystemModule|null find($id, $lockMode = null, $lockVersion = null)
 * @method SystemModule|null findOneBy(array $criteria, array $orderBy = null)
 * @method SystemModule[]    findAll()
 * @method SystemModule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SystemModuleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SystemModule::class);
    }

    // /**
    //  * @return SystemModule[] Returns an array of SystemModule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SystemModule
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
