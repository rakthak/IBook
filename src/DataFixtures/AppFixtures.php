<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Book;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        //Création d'un user
        $faker = Factory::create('fr_FR');

        for ($h = 0; $h < 10; $h++) {
            $user = new User();
            $user->setEmail($faker->freeEmail())
                ->setFirstName($faker->firstName())
                ->setLastName($faker->lastName());
            $password = $this->encoder->encodePassword($user, 'password');
            $user->setPassword($password);

            $manager->persist($user);
        }


        //Création de 4 categories
        for ($j = 0; $j < 4; $j++) {
            $category = new Category();
            $category->setName($faker->word());

            $manager->persist($category);


            //Création de 40 books
            for ($i = 0; $i < 10; $i++) {
                $book = new Book();
                $book->setTitle($faker->sentence())
                    ->setAuthor($faker->name())
                    ->setImage("https://picsum.photos/500")
                    ->setResume($faker->realText($maxNbChars = 200, $indexSize = 2))
                    ->setCreatedAt(new \DateTime())
                    ->setUser($user);
                $manager->persist($book);
            }
        }

        $manager->flush();
    }
}
