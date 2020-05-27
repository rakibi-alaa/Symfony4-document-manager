<?php

namespace App\Repository;

use App\Entity\ObjetAnalyse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ObjetAnalyse|null find($id, $lockMode = null, $lockVersion = null)
 * @method ObjetAnalyse|null findOneBy(array $criteria, array $orderBy = null)
 * @method ObjetAnalyse[]    findAll()
 * @method ObjetAnalyse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjetAnalyseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ObjetAnalyse::class);
    }

//    /**
//     * @return ObjetAnalyse[] Returns an array of ObjetAnalyse objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ObjetAnalyse
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
