<?php

namespace App\Repository;

use App\Entity\ListePrestation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListePrestation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListePrestation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListePrestation[]    findAll()
 * @method ListePrestation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListePrestationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListePrestation::class);
    }

    // /**
    //  * @return ListePrestation[] Returns an array of ListePrestation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListePrestation
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
