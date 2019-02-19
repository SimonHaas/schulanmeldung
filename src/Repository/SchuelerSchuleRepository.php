<?php

namespace App\Repository;

use App\Entity\SchuelerSchule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SchuelerSchule|null find($id, $lockMode = null, $lockVersion = null)
 * @method SchuelerSchule|null findOneBy(array $criteria, array $orderBy = null)
 * @method SchuelerSchule[]    findAll()
 * @method SchuelerSchule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchuelerSchuleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SchuelerSchule::class);
    }

//    /**
//     * @return SchuelerSchule[] Returns an array of SchuelerSchule objects
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
    public function findOneBySomeField($value): ?SchuelerSchule
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
