<?php

namespace App\Controllers;

use App\Containers\GruzzleContainer;
use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class BooksController extends AbstractController {
    public function __construct(ContainerInterface $container) {
        parent::__construct($container);
    }

    public function fetchBookDataByTitle(Request $request, Response $response, array $args): Response {
        $gruzzleClient = $this->getGruzzleClient();
        return $response;
    }


    private function getGruzzleClient(): Client {
        return $this->getContainer()->get(GruzzleContainer::getService());
    }
}