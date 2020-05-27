<?php

namespace App\Repository;

use App\Entity\MineralAnalyse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MineralAnalyse|null find($id, $lockMode = null, $lockVersion = null)
 * @method MineralAnalyse|null findOneBy(array $criteria, array $orderBy = null)
 * @method MineralAnalyse[]    findAll()
 * @method MineralAnalyse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MineralAnalyseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MineralAnalyse::class);
    }

//    /**
//     * @return MineralAnalyse[] Returns an array of MineralAnalyse objects
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
    public function findOneBySomeField($value): ?MineralAnalyse
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
