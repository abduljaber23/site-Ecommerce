<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use Symfony\Component\DomCrawler\Image;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $fields = [
            ImageField::new('image','Image')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
        ];

        $name = TextField::new('name' , 'Nom')
         ->setFormTypeOptions([
            'attr' => [
                'maxlength' => 255
            ]
            ]);

            $prix = TextField::new('prix' , 'Prix')
            ->setFormTypeOptions([
                'attr' => [
                    'maxlength' => 255
                ]
                ]);
                $fields[] = $name;
                $fields[] = $prix;
        return $fields;
    }
    
}
