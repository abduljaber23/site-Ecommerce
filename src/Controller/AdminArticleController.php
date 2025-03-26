<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/admin/articles')]
final class AdminArticleController extends AbstractController
{

    public function __construct(
        private PaginatorInterface $paginator
    ) {
    }

    #[Route('/', name: 'app_admin_article')]
    public function index(ArticleRepository $articleRepository, Request $request): Response
    {
        // $article = $articleRepository->findAll();

        $qb = $articleRepository->getAll();

        $article = $this->paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            10
        );


        return $this->render('admin_article/index.html.twig', [
            'controller_name' => 'AdminArticleController',
            'article' => $article,

        ]);
    }

    #[Route('/add-article', name: 'add_article')]
    public function addArticle(EntityManagerInterface $entityManager, Request $request): response
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($article);
            $entityManager->flush();


            $this->addFlash(
                'success',
                'L\'article a bien été ajouté!'
            );
            return $this->redirectToRoute('app_admin_article');


        }
        return $this->render('admin_article/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }




    #[Route('/edit-article/{id}', name: 'edit_article')]
    public function editArticle(EntityManagerInterface $entityManager, ArticleRepository $articleRepository, $id, Request $request): response
    {


        $article = $articleRepository->find($id);

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($article);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'L\'article a bien été modifié!'
            );

            return $this->redirectToRoute('app_admin_article');
        }
        return $this->render('admin_article/edit.html.twig', [
            'form' => $form->createView(),
        ]);

    }





    #[Route('/remove-article/{id}', name: 'remove_article')]
    public function removeArticle(EntityManagerInterface $entityManager, ArticleRepository $articleRepository, $id): response
    {
        $article = $articleRepository->find($id);
        $entityManager->remove($article);
        $entityManager->flush();
        $this->addFlash(
            'danger',
            'L\'article a bien été supprimé!'
        );
        return $this->redirectToRoute('app_admin_article');
    }



    #[Route('/show-article/{id}', name: 'show_article')]
    public function showCategory(ArticleRepository $articleRepository, $id): response
    {
        $article = $articleRepository->find($id);
        return $this->render('admin_article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
