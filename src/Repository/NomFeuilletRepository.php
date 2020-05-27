<?php

namespace App\Repository;

use App\Entity\NomFeuillet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NomFeuillet|null find($id, $lockMode = null, $lockVersion = null)
 * @method NomFeuillet|null findOneBy(array $criteria, array $orderBy = null)
 * @method NomFeuillet[]    findAll()
 * @method NomFeuillet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NomFeuilletRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NomFeuillet::class);
    }

//    /**
//     * @return NomFeuillet[] Returns an array of NomFeuillet objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NomFeuillet
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
