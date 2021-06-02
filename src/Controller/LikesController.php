<?php

namespace App\Controller;


use App\Entity\Book;
use App\Entity\BookLike;
use App\Repository\BookLikeRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class LikesController extends AbstractController
{
    /**
     * cette fonction permet de liké ou disliké un book
     * 
     */
    #[Route('/book/{id}/like', name: 'liker')]
    public function like(Book $book, EntityManagerInterface $manager, BookLikeRepository $bookLikeRepository): Response
    {
        $user = $this->getUser();
        if (!$user) return $this->json([
            'code' => 403,
            'message' => "non autoriser"
        ], 403);

        if ($book->likeByUser($user)) {
            $like = $bookLikeRepository->findOneBy([
                'book' => $book,
                'user' => $user
            ]);
            $manager->remove($like);
            $manager->flush();

            return $this->json([
                'code' => 200,
                'message' => 'le like est supprimé',
                'likes' => $bookLikeRepository->count(['book' => $book])
            ], 200);
        }

        $like = new BookLike();
        $like->setBook($book)
            ->setUser($user);
        $manager->persist($like);
        $manager->flush();
        return $this->json([
            'code' => 200,
            'message' => 'le like est ajouté',
            'likes' => $bookLikeRepository->count(['book' => $book])
        ], 200);
    }
}
