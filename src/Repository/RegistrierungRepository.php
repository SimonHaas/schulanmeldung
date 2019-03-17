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

    /**
     * @return Registrierung[]
     */
    public function findForExport()
    {
        return $this->createQueryBuilder('b')
            ->where('b.exportedAt IS NULL')
            ->getQuery()
            ->getResult();
    }
}
