<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\DemoRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class DemoExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('senpai', [DemoRuntime::class, 'senpai']),
            new TwigFilter('euro', [DemoRuntime::class, 'euro']),
            new TwigFilter('dollar', [DemoRuntime::class, 'dollar']),
            new TwigFilter('word', [DemoRuntime::class, 'word']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('coucou', [DemoRuntime::class, 'coucou']),
            new TwigFunction('get_categories', [DemoRuntime::class, 'getCategories']),
        ];
    }
}
