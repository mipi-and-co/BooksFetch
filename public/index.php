<?php


use App\Containers\AppContainer;
use App\Controllers\BooksController;
use Slim\Factory\AppFactory;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\TwigMiddleware;

require '../vendor/autoload.php';

$appContainer = new AppContainer();

AppFactory::setContainer($appContainer->getContainer());
$app = AppFactory::create();

$app->add(TwigMiddleware::createFromContainer($app));

$app->get("/book/{title}", BooksController::class . ":fetchBookDataByTitle");

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello Word !");
    return $response;
});

$app->get('/hello/{name}', function ($request, $response, $args) {
    return $this->get("view")->render($response, 'template/base_page.html', [
        'name' => $args['name']
    ]);
});

$app->run();
