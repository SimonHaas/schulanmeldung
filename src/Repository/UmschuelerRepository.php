<?php

namespace App\Repository;

use App\Entity\Schule;
use App\Entity\Umschueler;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Umschueler|null find($id, $lockMode = null, $lockVersion = null)
 * @method Umschueler|null findOneBy(array $criteria, array $orderBy = null)
 * @method Umschueler[]    findAll()
 * @method Umschueler[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UmschuelerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Umschueler::class);
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
