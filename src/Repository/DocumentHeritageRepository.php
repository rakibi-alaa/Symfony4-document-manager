<?php

namespace App\Repository;

use App\Entity\DocumentHeritage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocumentHeritage|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentHeritage|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentHeritage[]    findAll()
 * @method DocumentHeritage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentHeritageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocumentHeritage::class);
    }

//    /**
//     * @return DocumentHeritage[] Returns an array of DocumentHeritage objects
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
    public function findOneBySomeField($value): ?DocumentHeritage
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
