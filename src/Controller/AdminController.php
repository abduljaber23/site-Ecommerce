<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
      if (!$this->getUser()) {
        return $this->redirectToRoute('app_login');
      } 
        if ($this->getUser()->getRoles()[0] !== 'ROLE_ADMIN') {
            return $this->redirectToRoute('home.index');
        } else {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',

        ]);}
    }
}
