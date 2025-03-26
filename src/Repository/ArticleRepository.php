<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }


    //SELECT * FROM article as a;
    public function equivalentFindAll(){
        return $this->createQueryBuilder('a')
        ->getQuery()
        ->getResult();
    }

    
    public function getAll(){
        return $this->createQueryBuilder('a');
    }
}
