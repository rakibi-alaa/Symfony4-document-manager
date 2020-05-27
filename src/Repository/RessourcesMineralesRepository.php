<?php

namespace App\Repository;

use App\Entity\RessourcesMinerales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RessourcesMinerales|null find($id, $lockMode = null, $lockVersion = null)
 * @method RessourcesMinerales|null findOneBy(array $criteria, array $orderBy = null)
 * @method RessourcesMinerales[]    findAll()
 * @method RessourcesMinerales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RessourcesMineralesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RessourcesMinerales::class);
    }

//    /**
//     * @return RessourcesMinerales[] Returns an array of RessourcesMinerales objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RessourcesMinerales
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
