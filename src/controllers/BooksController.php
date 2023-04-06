<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class BooksController {
    public function fetchBookDataByTitle(Request $request, Response $response, array $args): Response {
        $title = $args["title"];
        $response->getBody()->write("Data for " . $title);
        return $response;
    }

}