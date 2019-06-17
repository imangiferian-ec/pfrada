<?php

namespace App\Repository;

use App\Entity\ClearanceFee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ClearanceFee|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClearanceFee|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClearanceFee[]    findAll()
 * @method ClearanceFee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClearanceFeeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ClearanceFee::class);
    }

    // /**
    //  * @return ClearanceFee[] Returns an array of ClearanceFee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ClearanceFee
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
