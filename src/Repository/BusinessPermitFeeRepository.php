<?php

namespace App\Repository;

use App\Entity\BusinessPermitFee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BusinessPermitFee|null find($id, $lockMode = null, $lockVersion = null)
 * @method BusinessPermitFee|null findOneBy(array $criteria, array $orderBy = null)
 * @method BusinessPermitFee[]    findAll()
 * @method BusinessPermitFee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BusinessPermitFeeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BusinessPermitFee::class);
    }

    // /**
    //  * @return BusinessPermitFee[] Returns an array of BusinessPermitFee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BusinessPermitFee
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
