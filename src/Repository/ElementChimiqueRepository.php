<?php

namespace App\Repository;

use App\Entity\ElementChimique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ElementChimique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ElementChimique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ElementChimique[]    findAll()
 * @method ElementChimique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElementChimiqueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ElementChimique::class);
    }

//    /**
//     * @return ElementChimique[] Returns an array of ElementChimique objects
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
    public function findOneBySomeField($value): ?ElementChimique
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
