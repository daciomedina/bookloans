<?php

namespace App\Controller;

use App\Entity\BooksGenreDef;
use App\Form\BooksGenreDefType;
use App\Repository\BooksGenreDefRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/books/genre/def")
 */
class BooksGenreDefController extends AbstractController
{
    /**
     * @Route("/", name="books_genre_def_index", methods={"GET"})
     */
    public function index(BooksGenreDefRepository $booksGenreDefRepository): Response
    {
        return $this->render('books_genre_def/index.html.twig', [
            'books_genre_defs' => $booksGenreDefRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="books_genre_def_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $booksGenreDef = new BooksGenreDef();
        $form = $this->createForm(BooksGenreDefType::class, $booksGenreDef);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($booksGenreDef);
            $entityManager->flush();

            return $this->redirectToRoute('books_genre_def_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('books_genre_def/new.html.twig', [
            'books_genre_def' => $booksGenreDef,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="books_genre_def_show", methods={"GET"})
     */
    public function show(BooksGenreDef $booksGenreDef): Response
    {
        return $this->render('books_genre_def/show.html.twig', [
            'books_genre_def' => $booksGenreDef,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="books_genre_def_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, BooksGenreDef $booksGenreDef, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BooksGenreDefType::class, $booksGenreDef);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('books_genre_def_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('books_genre_def/edit.html.twig', [
            'books_genre_def' => $booksGenreDef,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="books_genre_def_delete", methods={"POST"})
     */
    public function delete(Request $request, BooksGenreDef $booksGenreDef, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$booksGenreDef->getId(), $request->request->get('_token'))) {
            $entityManager->remove($booksGenreDef);
            $entityManager->flush();
        }

        return $this->redirectToRoute('books_genre_def_index', [], Response::HTTP_SEE_OTHER);
    }
}
