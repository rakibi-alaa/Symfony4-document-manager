<?php

namespace App\Repository;

use App\Entity\DocumentChrono;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocumentChrono|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentChrono|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentChrono[]    findAll()
 * @method DocumentChrono[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentChronoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocumentChrono::class);
    }

//    /**
//     * @return DocumentChrono[] Returns an array of DocumentChrono objects
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
    public function findOneBySomeField($value): ?DocumentChrono
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
