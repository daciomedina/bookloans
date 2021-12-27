<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bookName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $authorName;

    /**
     * @ORM\Column(type="integer")
     */
    private $qty;

    /**
     * @ORM\OneToMany(targetEntity=BooksLoans::class, mappedBy="book_id")
     */
    private $bookLoans;

    /**
     * @ORM\ManyToOne(targetEntity=BooksGenreDef::class, inversedBy="books")
     */
    private $bookGenreRel;

    public function __construct()
    {
        $this->logdate = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookName(): ?string
    {
        return $this->bookName;
    }

    public function setBookName(string $bookName): self
    {
        $this->bookName = $bookName;

        return $this;
    }

    public function getAuthorName(): ?string
    {
        return $this->authorName;
    }

    public function setAuthorName(string $authorName): self
    {
        $this->authorName = $authorName;

        return $this;
    }

    public function getQty(): ?int
    {
        return $this->qty;
    }

    public function setQty(int $qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * @return Collection|BooksLoans[]
     */
    public function getBookLoans(): Collection
    {
        return $this->bookLoans;
    }

    public function addBookLoans(BooksLoans $bookLoans): self
    {
        if (!$this->bookLoans->contains($bookLoans)) {
            $this->logdate[] = $bookLoans;
            $bookLoans->setBookId($this);
        }

        return $this;
    }

    public function removeBookLoans(BooksLoans $bookLoans): self
    {
        if ($this->bookLoans->removeElement($bookLoans)) {
            // set the owning side to null (unless already changed)
            if ($bookLoans->getBookId() === $this) {
                $bookLoans->setBookId(null);
            }
        }

        return $this;
    }

    public function getBookGenreRel(): ?BooksGenreDef
    {
        return $this->bookGenreRel;
    }

    public function setBookGenreRel(?BooksGenreDef $bookGenreRel): self
    {
        $this->bookGenreRel = $bookGenreRel;

        return $this;
    }

    public function __toString()
    {
        return $this->bookName;
    }
}
