<?php

namespace App\Repository;

use App\Entity\BooksLoans;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BooksLoans|null find($id, $lockMode = null, $lockVersion = null)
 * @method BooksLoans|null findOneBy(array $criteria, array $orderBy = null)
 * @method BooksLoans[]    findAll()
 * @method BooksLoans[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BooksLoansRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BooksLoans::class);
    }

    public function findTotalBookLoans($value)
    {

        return $this->createQueryBuilder('bl')
            ->andWhere('bl.book_id = :value')
            ->andWhere('bl.closed = false')
            ->setParameter('value', $value)
            ->select('COUNT(bl.book_id) as TotalLoaned')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getAllBookLoansByBookId($value)
    {


        $qb = $this->createQueryBuilder('bl')
        ->where('bl.book_id = :value')
        ->setParameter('value', $value)
        ->orderBy('bl.id', 'ASC')
        ;

        return $qb->getQuery()->getResult();

    }

    // /**
    //  * @return BooksLoans[] Returns an array of BooksLoans objects
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
    public function findOneBySomeField($value): ?BooksLoans
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
