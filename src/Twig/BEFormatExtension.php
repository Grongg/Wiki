<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class BEFormatExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('BEFormatEuro', [$this, 'BEFormatEuro']),
        ];
    }

    public function BEFormatEuro($value): string
    {
        return $value . ' BE';
    }
}