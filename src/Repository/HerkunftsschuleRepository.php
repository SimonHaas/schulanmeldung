<?php

namespace App\Repository;

use App\Entity\Herkunftsschule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Herkunftsschule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Herkunftsschule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Herkunftsschule[]    findAll()
 * @method Herkunftsschule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HerkunftsschuleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Herkunftsschule::class);
    }

//    /**
//     * @return Herkunftsschule[] Returns an array of Herkunftsschule objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Herkunftsschule
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
