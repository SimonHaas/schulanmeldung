<?php

namespace App\Repository;

use App\Entity\Beruf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Beruf|null find($id, $lockMode = null, $lockVersion = null)
 * @method Beruf|null findOneBy(array $criteria, array $orderBy = null)
 * @method Beruf[]    findAll()
 * @method Beruf[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BerufRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Beruf::class);
    }

//    /**
//     * @return Beruf[] Returns an array of Beruf objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Beruf
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
