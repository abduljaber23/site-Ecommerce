<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/admin/user')]
final class AdminUserController extends AbstractController
{
    #[Route('/', name: 'app_admin_user')]
    public function index(): Response
    {
        return $this->render('admin_user/index.html.twig', [
            'controller_name' => 'AdminUserController',
        ]);
    }
}
