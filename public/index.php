<?php

use Slim\Factory\AppFactory;
use \Psr\Http\Message\RequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Controllers\BooksController;

require '../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/{name}', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello Word !");
    $response->getBody()->write("Bienvenue " . $args["name"]);
    return $response;
});


$app->run();
