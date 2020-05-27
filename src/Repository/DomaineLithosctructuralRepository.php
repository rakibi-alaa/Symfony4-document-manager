<?php

namespace App\Repository;

use App\Entity\DomaineLithosctructural;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DomaineLithosctructural|null find($id, $lockMode = null, $lockVersion = null)
 * @method DomaineLithosctructural|null findOneBy(array $criteria, array $orderBy = null)
 * @method DomaineLithosctructural[]    findAll()
 * @method DomaineLithosctructural[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DomaineLithosctructuralRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DomaineLithosctructural::class);
    }

//    /**
//     * @return DomaineLithosctructural[] Returns an array of DomaineLithosctructural objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DomaineLithosctructural
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
