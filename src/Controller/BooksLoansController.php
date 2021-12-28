<?php

namespace App\Controller;

use App\Entity\BooksLoans;
use App\Form\BooksLoansType;
use App\Repository\BooksLoansRepository;
use App\Repository\BookRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/books/loans")
 */
class BooksLoansController extends AbstractController
{
    /**
     * @Route("/", name="books_loans_index", methods={"GET"})
     */
    public function index(BooksLoansRepository $booksLoansRepository): Response
    {
        return $this->render('books_loans/index.html.twig', [
            'books_loans' => $booksLoansRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="books_loans_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager,BooksLoansRepository $booksLoansRepository): Response
    {
        $booksLoan = new BooksLoans();
        $form = $this->createForm(BooksLoansType::class, $booksLoan);
        $form->handleRequest($request);
        $booksLoan->setClosed(false);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($booksLoan);
            $entityManager->flush();

            return $this->redirectToRoute('book_show', [
                "id" => $booksLoan->getBookId()->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('books_loans/new.html.twig', [
            'books_loan' => $booksLoan,
            'form' => $form,
            'id_book' => $request->query->get("id")

        ]);
    }

    /**
     * @Route("/{id}", name="books_loans_show", methods={"GET"})
     */
    public function show(BooksLoans $booksLoan): Response
    {
        return $this->render('books_loans/show.html.twig', [
            'books_loan' => $booksLoan,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="books_loans_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, BooksLoans $booksLoan, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BooksLoansType::class, $booksLoan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            
            return $this->redirectToRoute('book_show', [
                "id" => $booksLoan->getBookId()->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('books_loans/edit.html.twig', [
            'books_loan' => $booksLoan,
            'form' => $form,
        ]);
    }


    /**
     * @Route("/{id}/returned", name="books_loans_returned", methods={"GET", "POST"})
     */
    public function updateReturned(Request $request,BooksLoans $booksLoan, EntityManagerInterface $entityManager): Response
    {
        $booksLoan2 = new BooksLoans();
        $currentDate = new DateTime();
        $booksLoan2->setUserDNI($booksLoan->getUserDNI());
        $booksLoan2->setUserName($booksLoan->getUserName());
        $booksLoan2->setUserPhone($booksLoan->getUserPhone());
        $booksLoan2->setBookId($booksLoan->getBookId());
        $booksLoan2->setReturned(true);
        $booksLoan2->setClosed(true);
        $booksLoan->setClosed(true);
        $booksLoan2->setLogdate($currentDate);

        $entityManager->persist($booksLoan);
        $entityManager->persist($booksLoan2);
        $entityManager->flush();

        return $this->redirectToRoute('book_show', [
            "id" => $booksLoan->getBookId()->getId()
        ], Response::HTTP_SEE_OTHER);

    }

    /**
     * @Route("/{id}", name="books_loans_delete", methods={"POST"})
     */
    public function delete(Request $request, BooksLoans $booksLoan, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$booksLoan->getId(), $request->request->get('_token'))) {
            $entityManager->remove($booksLoan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('books_loans_index', [], Response::HTTP_SEE_OTHER);
    }
}
