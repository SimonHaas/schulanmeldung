<?php

namespace App\Repository;

use App\Entity\Betrieb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Betrieb|null find($id, $lockMode = null, $lockVersion = null)
 * @method Betrieb|null findOneBy(array $criteria, array $orderBy = null)
 * @method Betrieb[]    findAll()
 * @method Betrieb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BetriebRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Betrieb::class);
    }

    /**
     * @return Betrieb[] Returns all verified Betriebe
     */
    public function findAllVerified()
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.istVerifiziert = :val')
            ->setParameter('val', true)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Betrieb[] Returns an array of Betrieb objects
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
    public function findOneBySomeField($value): ?Betrieb
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
