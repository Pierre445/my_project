<?php

namespace App\Repository;

use App\Entity\Fan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fan|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fan|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fan[]    findAll()
 * @method Fan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fan::class);
    }

    // /**
    //  * @return Fan[] Returns an array of Fan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fan
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
