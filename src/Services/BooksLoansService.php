<?php

namespace App\Services;

use App\Entity\BooksLoans;
use Doctrine\ORM\EntityManagerInterface;

class BooksLoansService{

    protected $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
       //parent::__construct($entityManager);

        $this->repository = $entityManager->getRepository(BooksLoans::class);
    }

    function getAllBookLoansByBookId($idBook){
        return $this->repository->getAllBookLoansByBookId($idBook);
    }

    function findTotalBookLoans($idBook){
        return $this->repository->findTotalBookLoans($idBook);
    }
}