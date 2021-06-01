<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/book', name: 'book')]
    public function index(BookRepository $bookRepository): Response
    {
        return $this->render('book/book.html.twig', [
            'lastBooks' => $bookRepository->lastBook(),
        ]);
    }

    #[Route('/allBooks', name: 'allBooks')]
    public function allBooks(BookRepository $bookRepository): Response
    {
        $repo = $this->getDoctrine()->getRepository(Book::class);
        $book = $repo->findAll();

        if (!$book) {
            return $this->redirectToRoute('book');
        }

        return $this->render('book/allBooks.html.twig', [
            'books' => $book,
        ]);
    }

    #[Route('/allBooks/{id}', name: 'read')]
    public function readBook(BookRepository $bookRepository, $id): Response
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->find($id);


        if (!$book) {
            return $this->redirectToRoute('book');
        }

        return $this->render('book/readBook.html.twig', [
            'books' => $book,
        ]);
    }
}
