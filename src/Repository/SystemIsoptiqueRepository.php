<?php

namespace App\Repository;

use App\Entity\SystemIsoptique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SystemIsoptique|null find($id, $lockMode = null, $lockVersion = null)
 * @method SystemIsoptique|null findOneBy(array $criteria, array $orderBy = null)
 * @method SystemIsoptique[]    findAll()
 * @method SystemIsoptique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SystemIsoptiqueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SystemIsoptique::class);
    }

//    /**
//     * @return SystemIsoptique[] Returns an array of SystemIsoptique objects
//     */
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
    public function findOneBySomeField($value): ?SystemIsoptique
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
