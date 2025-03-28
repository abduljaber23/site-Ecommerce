<?php

namespace App\Controller;

use App\Entity\Humain;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ProductController extends AbstractController
{
    #[Route('/product', name: 'add-name')]
    public function createProduct(EntityManagerInterface $entityManager): Response
    {
        $product = new Categorie();
// $product->setLabel('gaming');
// $product->setPrix(499);
// $product->setCategorie('gaming');
// $product->setImage('https://www.xbox.com/fr-FR/consoles/xbox-series-x');







        // $product->setPassword(12345);
        // $product->setPhone('069871258');
        // $product->setSiret(123456789);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }



    // #[Route('/remove-product/{id}', name: 'remove_article')]
    // public function removeBrand(EntityManagerInterface $entityManager,ArticleRepository $articleRepository,$id): response 
    // {
    //     $article = $articleRepository->find($id);
    //     $entityManager->remove($article);
    //     $entityManager->flush();
    //     return $this->redirectToRoute('shop.index');
    // }

    // #[Route('/edit-article/{id}', name: 'edit_article')]
    // public function editArticle(EntityManagerInterface $entityManager,ArticleRepository $articleRepository, $id): response 
    // {
    //     $article = $articleRepository->find($id);
    //     $article->setName('Iphone 16 pro max');
    //     $entityManager->persist($article);
    //     $entityManager->flush();
    //     return $this->redirectToRoute('shop.index');
    // }


}
