<?php

namespace App\Repository;

use App\Entity\Typologie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Typologie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typologie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typologie[]    findAll()
 * @method Typologie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypologieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Typologie::class);
    }

//    /**
//     * @return Typologie[] Returns an array of Typologie objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typologie
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
