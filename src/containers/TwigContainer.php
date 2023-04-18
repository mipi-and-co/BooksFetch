<?php

namespace App\Containers;

use Slim\Views\Twig;

class TwigContainer implements ContainerInterface {
    private const SERVICE = "view";
    private const PATH_TO_TEMPLATE = "../views";
    private const PATH_TO_CACHE = "../tmp/cache";
    public static function generateContainer(): Twig {
        //return  Twig::create(self::PATH_TO_TEMPLATE, ['cache' => self::PATH_TO_CACHE]);
        return  Twig::create(self::PATH_TO_TEMPLATE);
    }
    public static function getService(): string {
        return self::SERVICE;
    }
}