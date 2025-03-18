<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/shop')]
final class ShopController extends AbstractController
{
    #[Route('/', name: 'shop.index')]
    public function index(ArticleRepository $articleRepository,CategorieRepository $categorieRepository): Response
    {
        $articles = $articleRepository->findAll();
        $categorie = $categorieRepository->findAll();
        // $articles = $articleRepository->findBy([], ['id' => 'DESC'], 5);
        // $articles = $articleRepository->find(1);
        // dd($articles);
        
        return $this->render('shop/index.html.twig', [
            'articles' => $articles,
            'categorie' => $categorie,
        ]);
    }
    // #[Route('/produit', name: 'produit.shop')]
    // public function produit(): Response
    // {
    //     return $this->render('shop/produit.html.twig', [
            
    //     ]);
    // }
    // #[Route('/detail', name: 'detail.shop')]
    // public function detail(): Response
    // {
    //     return $this->render('shop/index.html.twig', [
            
    //     ]);
    // }
    #[Route('/detailid/{id}', name: 'detailid.shop')]
    public function detailid($id,ArticleRepository $articleRepo ): Response
    {
        $article = $articleRepo->find($id);
        
        return $this->render('shop/detail.html.twig', [
            'article' => $article,
        ]);
    }
    // #[Route('/categorie/{id}', name: 'categorie.shop')]
    // public function categorie($id,CategorieRepository $categorieRepo): Response
    // {
    //     $categorie = $categorieRepo->find($id);
    //     return $this->render('shop/categorie.html.twig', [
    //         'categorie' => $categorie,
            
    //     ]);
    // }
    #[Route('/categorie/{id}', name: 'categorie.shop')]
    public function categorie($id,CategorieRepository $categorieRepo): Response
    {
        $categorie = $categorieRepo->findBy(['id' => $id]);
        // dd($categorie);
        return $this->render('shop/categorie.html.twig', [
            'categorie' => $categorie,
            'id' => $id
            
        ]);
    }
}
