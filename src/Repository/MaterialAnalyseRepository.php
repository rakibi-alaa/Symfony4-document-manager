<?php

namespace App\Repository;

use App\Entity\MaterialAnalyse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MaterialAnalyse|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaterialAnalyse|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaterialAnalyse[]    findAll()
 * @method MaterialAnalyse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaterialAnalyseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MaterialAnalyse::class);
    }

//    /**
//     * @return MaterialAnalyse[] Returns an array of MaterialAnalyse objects
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
    public function findOneBySomeField($value): ?MaterialAnalyse
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
