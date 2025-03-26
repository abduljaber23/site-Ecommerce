<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategoryType;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/admin/category')]
final class AdminCategoryController extends AbstractController
{
    #[Route('/', name: 'app_category')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        $category = $categorieRepository->findAll();

        return $this->render('admin_category/index.html.twig', [
            'controller_name' => 'AdminCategoryController',
            'category' => $category,
        ]);
    }

    #[Route('/add-category', name: 'add_cate')]
    public function addCategoriy(EntityManagerInterface $entityManager, Request $request): response 
    {
        $categorie = new Categorie();

        $form = $this->createForm(CategoryType::class, $categorie);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($categorie);
            $entityManager->flush();
        }
        return $this->render('admin_category/add.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    #[Route('/remove-category/{id}', name: 'remove_cate')]
    public function removeBrand(EntityManagerInterface $entityManager,CategorieRepository $cateRepository,$id): response 
    {
        $cate = $cateRepository->find($id);
        $entityManager->remove($cate);
        $entityManager->flush();
        return $this->redirectToRoute('app_category');
    }


    #[Route('/edit-category/{id}', name: 'edit_cate')]
    public function editCategory(EntityManagerInterface $entityManager,CategorieRepository $categoryRepository, $id , Request $request): response 
    {
        // $category = $categoryRepository->find($id);
        // $category->setLabel('Smartphone');
        // $entityManager->persist($category);
        // $entityManager->flush();
        // return $this->render('admin_category/edit.html.twig');

        $category = $categoryRepository->find($id);

        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($category);
            $entityManager->flush();
        }
        return $this->render('admin_category/edit.html.twig',[
            'form' => $form->createView(),
        ]);
        
    }

    #[Route('/show-category/{id}', name: 'show_cate')]
    public function showCategory(CategorieRepository $categoryRepository, $id): response 
    {
        $category = $categoryRepository->find($id);
        return $this->render('admin_category/show.html.twig', [
            'category' => $category,
        ]);
    }
}
