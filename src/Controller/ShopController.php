<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/shop')]
final class ShopController extends AbstractController
{
    #[Route('/', name: 'shop.index')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();
        

        // dd($articles);
        return $this->render('shop/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    #[Route('/produit', name: 'produit.shop')]
    public function produit(): Response
    {
        return $this->render('shop/produit.html.twig', [
            
        ]);
    }
    #[Route('/detail', name: 'detail.shop')]
    public function detail(): Response
    {
        return $this->render('shop/index.html.twig', [
            
        ]);
    }
}
