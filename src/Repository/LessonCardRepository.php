<?php

namespace App\Repository;

use App\Entity\LessonCard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LessonCard|null find($id, $lockMode = null, $lockVersion = null)
 * @method LessonCard|null findOneBy(array $criteria, array $orderBy = null)
 * @method LessonCard[]    findAll()
 * @method LessonCard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LessonCardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LessonCard::class);
    }

    // /**
    //  * @return LessonCard[] Returns an array of LessonCard objects
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
    public function findOneBySomeField($value): ?LessonCard
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
