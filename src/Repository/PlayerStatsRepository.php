<?php

namespace App\Repository;

use App\Entity\PlayerStats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PlayerStats|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayerStats|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayerStats[]    findAll()
 * @method PlayerStats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerStatsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PlayerStats::class);
    }

}
