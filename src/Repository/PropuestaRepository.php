<?php

namespace App\Repository;

use App\Entity\Propuesta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Propuesta|null find($id, $lockMode = null, $lockVersion = null)
 * @method Propuesta|null findOneBy(array $criteria, array $orderBy = null)
 * @method Propuesta[]    findAll()
 * @method Propuesta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropuestaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Propuesta::class);
    }

//    /**
//     * @return Propuesta[] Returns an array of Propuesta objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Propuesta
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
