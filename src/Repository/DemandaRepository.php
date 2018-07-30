<?php

namespace App\Repository;

use App\Entity\Demanda;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Demanda|null find($id, $lockMode = null, $lockVersion = null)
 * @method Demanda|null findOneBy(array $criteria, array $orderBy = null)
 * @method Demanda[]    findAll()
 * @method Demanda[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Demanda::class);
    }

//    /**
//     * @return Demanda[] Returns an array of Demanda objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Demanda
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
