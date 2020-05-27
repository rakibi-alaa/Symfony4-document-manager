<?php

namespace App\Repository;

use App\Entity\Elements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Elements|null find($id, $lockMode = null, $lockVersion = null)
 * @method Elements|null findOneBy(array $criteria, array $orderBy = null)
 * @method Elements[]    findAll()
 * @method Elements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElementsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Elements::class);
    }

//    /**
//     * @return Elements[] Returns an array of Elements objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Elements
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
