<?php

namespace App\Repository;

use App\Entity\Kontaktperson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kontaktperson|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kontaktperson|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kontaktperson[]    findAll()
 * @method Kontaktperson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KontaktpersonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kontaktperson::class);
    }

//    /**
//     * @return Kontaktperson[] Returns an array of Kontaktperson objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kontaktperson
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
