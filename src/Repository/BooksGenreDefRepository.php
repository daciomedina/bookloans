<?php

namespace App\Repository;

use App\Entity\BooksGenreDef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BooksGenreDef|null find($id, $lockMode = null, $lockVersion = null)
 * @method BooksGenreDef|null findOneBy(array $criteria, array $orderBy = null)
 * @method BooksGenreDef[]    findAll()
 * @method BooksGenreDef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BooksGenreDefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BooksGenreDef::class);
    }

    // /**
    //  * @return BooksGenreDef[] Returns an array of BooksGenreDef objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BooksGenreDef
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
