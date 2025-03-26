<?php

namespace App\Twig\Runtime;

use App\Controller\ShopController;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Twig\Extension\RuntimeExtensionInterface;

class DemoRuntime implements RuntimeExtensionInterface
{

    public function __construct(
        private CategorieRepository $categorieRepository,
        private ArticleRepository $articleRepository,
    ) {
        // Inject dependencies if needed
    }
    public function senpai(string $value)
    {
        return '!!!' . $value . '!!!';
    }

    public function euro(string $value)
    {
        return $value . ' €';
    }
    public function dollar(string $value)
    {
        return $value . ' $';
    }

    public function word($text, $length = 73, $suffix = '...')
    {
        if (strlen($text) <= $length) {
            return $text;
        }

        return substr($text, 0, $length) . $suffix;
    }


    public function coucou($value)
    {
        return 'coucou' . $value;
    }


    public function getCategories(): array
    {
        return $this->categorieRepository->findAll();
    }
}
