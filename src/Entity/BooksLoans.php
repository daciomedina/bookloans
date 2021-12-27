<?php

namespace App\Entity;

use App\Repository\BooksLoansRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BooksLoansRepository::class)
 */
class BooksLoans
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Book::class, inversedBy="bookLoans")
     */
    private $book_id;

    /**
     * @ORM\Column(type="date")
     */
    private $logdate;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $returned = false;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $UserDNI;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $UserName;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $UserPhone;

    /**
     * @ORM\Column(type="boolean",  options={"default": false})
     */
    private $closed;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookId(): ?Book
    {
        return $this->book_id;
    }

    public function setBookId(?Book $book_id): self
    {
        $this->book_id = $book_id;

        return $this;
    }

    public function getLogdate(): ?\DateTimeInterface
    {
        return $this->logdate;
    }

    public function setLogdate(\DateTimeInterface $logdate): self
    {
        $this->logdate = $logdate;

        return $this;
    }

    public function getReturned(): ?int
    {
        return $this->returned;
    }

    public function setReturned(bool $returned): self
    {

        $this->returned = $returned;

        return $this;
    }

    public function getUserDNI(): ?string
    {
        return $this->UserDNI;
    }

    public function setUserDNI(string $UserDNI): self
    {
        $this->UserDNI = $UserDNI;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->UserName;
    }

    public function setUserName(string $UserName): self
    {
        $this->UserName = $UserName;

        return $this;
    }

    public function getUserPhone(): ?string
    {
        return $this->UserPhone;
    }

    public function setUserPhone(string $UserPhone): self
    {
        $this->UserPhone = $UserPhone;

        return $this;
    }

    public function getClosed(): ?int
    {
        return $this->closed;
    }

    public function setClosed(bool $closed): self
    {

        $this->closed = $closed;

        return $this;
    }
}
