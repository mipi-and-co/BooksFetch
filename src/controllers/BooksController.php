<?php

namespace App\Controllers;

use \Psr\Http\Message\RequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;
use GuzzleHttp\Client;
use App\Containers\GruzzleContainer;
use App\wrappers\GoogleBooksWrappers;

class BooksController extends AbstractController {
    private GoogleBooksWrappers $wrapper;

    public function __construct(ContainerInterface $container) {
        parent::__construct($container);
        $this->wrapper = new GoogleBooksWrappers($this->getGruzzleClient(), getenv("API_KEY"));
    }

    public function fetchBookDataByTitle(Request $request, Response $response, array $args): Response {
        $googleBooksResponse = $this->wrapper->fetchBooksDataByTitle("Antoine de Saint-Exupery");
        $response->getBody()->write("bonjour");
        return $response;
    }

    private function getGruzzleClient(): Client {
        return $this->getContainer()->get(GruzzleContainer::getService());
    }
}