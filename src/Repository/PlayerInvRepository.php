<?php

namespace App\Repository;

use App\Entity\PlayerInv;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PlayerInv|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayerInv|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayerInv[]    findAll()
 * @method PlayerInv[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerInvRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PlayerInv::class);
    }

    // /**
    //  * @return PlayerInv[] Returns an array of PlayerInv objects
    //  */
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
    public function findOneBySomeField($value): ?PlayerInv
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
