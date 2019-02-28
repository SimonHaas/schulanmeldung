<?php

namespace App\Repository;

use App\Entity\Beruf;
use App\Entity\Registrierung;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Registrierung|null find($id, $lockMode = null, $lockVersion = null)
 * @method Registrierung|null findOneBy(array $criteria, array $orderBy = null)
 * @method Registrierung[]    findAll()
 * @method Registrierung[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistrierungRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Registrierung::class);
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
