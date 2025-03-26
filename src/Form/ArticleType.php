<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class , [
                'label' => "Nom du l'Article",
                "required" => true,
            ])
            ->add('image', TextType::class , [
                'label' => "Image du l'Article",
                "required" => true,
               
            ])
            ->add('prix', TextType::class , [
                'label' => "Prix du l'Article",
                "required" => true,
            ])
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'label',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
