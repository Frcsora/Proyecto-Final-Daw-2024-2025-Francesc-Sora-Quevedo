<?php

namespace App\Helpers;

use enshrined\svgSanitize\Sanitizer;

class SanitizeSVG
{
    public static function sanitizeSVG($socialmedias)
    {
        $sanitizer = new Sanitizer();

        foreach ($socialmedias as $socialmedia) {
            $cleanSvg = $sanitizer->sanitize($socialmedia->medias->svg);
            $socialmedia->svg = $cleanSvg;
        }

        return $socialmedias;
    }
}
