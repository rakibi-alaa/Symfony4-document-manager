<?php

namespace App\Repository;

use App\Entity\MethodeAnalyse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MethodeAnalyse|null find($id, $lockMode = null, $lockVersion = null)
 * @method MethodeAnalyse|null findOneBy(array $criteria, array $orderBy = null)
 * @method MethodeAnalyse[]    findAll()
 * @method MethodeAnalyse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MethodeAnalyseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MethodeAnalyse::class);
    }

//    /**
//     * @return MethodeAnalyse[] Returns an array of MethodeAnalyse objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MethodeAnalyse
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
