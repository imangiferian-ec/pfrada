<?php

namespace App\Repository;

use App\Entity\ClearancePurpose;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ClearancePurpose|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClearancePurpose|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClearancePurpose[]    findAll()
 * @method ClearancePurpose[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClearancePurposeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ClearancePurpose::class);
    }

    // /**
    //  * @return ClearancePurpose[] Returns an array of ClearancePurpose objects
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
    public function findOneBySomeField($value): ?ClearancePurpose
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
