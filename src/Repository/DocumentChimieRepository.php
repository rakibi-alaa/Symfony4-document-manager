<?php

namespace App\Repository;

use App\Entity\DocumentChimie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocumentChimie|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentChimie|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentChimie[]    findAll()
 * @method DocumentChimie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentChimieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocumentChimie::class);
    }

//    /**
//     * @return DocumentChimie[] Returns an array of DocumentChimie objects
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
    public function findOneBySomeField($value): ?DocumentChimie
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
