<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/shop')]
final class ShopController extends AbstractController
{
    #[Route('/', name: 'shop.index')]
    public function index(): Response
    {
        return $this->render('shop/index.html.twig', [
            'controller_name' => 'ShopController',
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
