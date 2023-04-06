<?php

namespace App\Containers;

use GuzzleHttp\Client;

class GruzzleContainer implements ContainerInterface {

    private const GOOGLE_BOOKS_URI = "https://www.googleapis.com/books/v1/";

    public static function generateContainer(): Client
    {
        return new Client([
            "base_uri" => self::GOOGLE_BOOKS_URI
        ]);
    }
}

