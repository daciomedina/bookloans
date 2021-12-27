<?php

namespace App\Services;

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

class BookService
{
    protected $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
       //parent::__construct($entityManager);

        $this->repository = $entityManager->getRepository(Book::class);
    }

    public function findByNameOrAuthor($searchWord){
        return $this->repository->findByNameOrAuthor($searchWord);
    }

    public function getTotalBooks(){
        return $this->repository->getTotalBooks();
    }


}