<?php

use App\Containers\AppContainer;
use App\Controllers\BooksController;
use Slim\Factory\AppFactory;
use \Psr\Http\Message\RequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$appContainer = new AppContainer();

AppFactory::setContainer($appContainer->getContainer());
$app = AppFactory::create();

$app->get("/book/{title}", BooksController::class . ":fetchBookDataByTitle");

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello Word !");
    return $response;
});

$app->get('/{name}', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello Word !");
    $response->getBody()->write("Bienvenue " . $args["name"]);
    return $response;
});


$app->run();
