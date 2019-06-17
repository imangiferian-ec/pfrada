<?php

namespace App\Repository;

use App\Entity\ReservationFee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReservationFee|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReservationFee|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReservationFee[]    findAll()
 * @method ReservationFee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationFeeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReservationFee::class);
    }

    // /**
    //  * @return ReservationFee[] Returns an array of ReservationFee objects
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
    public function findOneBySomeField($value): ?ReservationFee
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
