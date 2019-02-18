<?php

namespace App\Repository;

use App\Entity\BesuchteSchule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BesuchteSchule|null find($id, $lockMode = null, $lockVersion = null)
 * @method BesuchteSchule|null findOneBy(array $criteria, array $orderBy = null)
 * @method BesuchteSchule[]    findAll()
 * @method BesuchteSchule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BesuchteSchuleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BesuchteSchule::class);
    }

//    /**
//     * @return BesuchteSchule[] Returns an array of BesuchteSchule objects
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
    public function findOneBySomeField($value): ?BesuchteSchule
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
