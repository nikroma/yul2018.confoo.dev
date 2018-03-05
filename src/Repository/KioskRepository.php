<?php

namespace App\Repository;

use App\Entity\Kiosk;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kiosk|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kiosk|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kiosk[]    findAll()
 * @method Kiosk[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KioskRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kiosk::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('k')
            ->where('k.something = :value')->setParameter('value', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
