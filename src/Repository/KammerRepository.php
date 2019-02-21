<?php

namespace App\Repository;

use App\Entity\Kammer;
use App\Entity\Schule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kammer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kammer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kammer[]    findAll()
 * @method Kammer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KammerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kammer::class);
    }

//    /**
//     * @return Schule[] Returns an array of Schule objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Schule
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
