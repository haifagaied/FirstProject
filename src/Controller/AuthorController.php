<?php

namespace App\Controller;

use PharIo\Manifest\Author;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }


    #[Route('/show/{name}', name: 'show_author')]
public function showAuthor(string $name): Response
{
    return $this->render('author/show.html.twig', [
        'nom' => $name,
        'prenom' => 'benfoulen'
    ]);
}
    #[Route('/list', name: 'list_author')]
public function listAuthor(): Response
{
    $authors = array(
        array(
            'id' => 1,
            'picture' => 'images/vh.jpg',
            'username' => 'Victor Hugo',
            'email' => 'victor.hugo@gmail.com',
            'nb_books' => 100
        ),
        array(
            'id' => 2,
            'picture' => 'images/will.jpg',
            'username' => 'William Shakespeare',
            'email' => 'william.shakespeare@gmail.com',
            'nb_books' => 200
        ),
        array(
            'id' => 3,
            'picture' => 'images/TahaHussein.jpg',
            'username' => 'Taha Hussein',
            'email' => 'taha.hussein@gmail.com',
            'nb_books' => 300
        ),
    );

    return $this->render('author/list.html.twig', array(
        'authors' => $authors
    ));
}
#[Route('/author/{id}', name: 'author_details')]
    public function authorDetails(int $id): Response
    {
        // Même tableau que dans listAuthor (ou idéalement récupérer depuis une base)
        $authors = [
            1 => [
                'id' => 1,
                'picture' => 'images/vh.jpg',
                'username' => 'Victor Hugo',
                'email' => 'victor.hugo@gmail.com',
                'nb_books' => 100
            ],
            2 => [
                'id' => 2,
                'picture' => 'images/will.jpg',
                'username' => 'William Shakespeare',
                'email' => 'william.shakespeare@gmail.com',
                'nb_books' => 200
            ],
            3 => [
                'id' => 3,
                'picture' => 'images/TahaHussein.jpg',
                'username' => 'Taha Hussein',
                'email' => 'taha.hussein@gmail.com',
                'nb_books' => 300
            ],
        ];

        // Vérifier si l'auteur existe
        if (!isset($authors[$id])) {
            throw $this->createNotFoundException('Auteur non trouvé');
        }

        $author = $authors[$id];

        return $this->render('author/showAuthor.html.twig', [
    'author' => $author
]);

    }
}

