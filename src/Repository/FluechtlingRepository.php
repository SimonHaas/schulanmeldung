<?php

namespace App\Repository;

use App\Entity\Fluechtling;
use App\Entity\Schule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fluechtling|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fluechtling|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fluechtling[]    findAll()
 * @method Fluechtling[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FluechtlingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fluechtling::class);
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
