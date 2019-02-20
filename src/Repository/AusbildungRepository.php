<?php

namespace App\Repository;

use App\Entity\Ausbildung;
use App\Entity\Beruf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ausbildung|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ausbildung|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ausbildung[]    findAll()
 * @method Ausbildung[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AusbildungRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ausbildung::class);
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
