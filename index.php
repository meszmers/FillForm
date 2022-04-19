<?php

require_once 'vendor/autoload.php';


use App\Redirect;

use App\Repositories\Form\FormRepository;
use App\Repositories\Registry\RegistryRepository;
use App\View;
use DI\ContainerBuilder;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use function DI\create;

session_start();

/*
 * Load .env files into project
*/
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();

/*
 * Construct database based on .env input
*/
$databaseRegistry = trim('App\Repositories\Registry\ ') . 'PDO_RegistryRepository';
$databaseForm = trim('App\Repositories\Form\ ') . 'PDO_FormRepository';


/*
 * Build a container
*/
$builder = new ContainerBuilder();
$builder->addDefinitions([
    RegistryRepository::class => create($databaseRegistry),
    FormRepository::class => create($databaseForm)
]);
$container = $builder->build();

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    //Website Routes
    $r->addRoute('GET', '/', [App\Controllers\WebsiteController::class, "index"]);
    $r->addRoute('GET', '/form/{id:\d+}', [App\Controllers\FormController::class, "show"]);

    //FormController
    $r->addRoute('GET', '/registry/{id:\d+}', [App\Controllers\FormController::class, "index"]);
    $r->addRoute('GET', '/form/{id:\d+}/update', [App\Controllers\FormController::class, "update"]);
    $r->addRoute('POST', '/registry/{id:\d+}', [App\Controllers\FormController::class, "create"]);

    //Registry
    $r->addRoute('GET', '/registry', [App\Controllers\RegistryController::class, "home"]);
    $r->addRoute('GET', '/registry/personList', [App\Controllers\RegistryController::class, "personList"]);

    //Factory
//    $r->addRoute('GET', '/factory/persons/{id:\d+}', [App\Controllers\FactoryController::class, "PersonRegistry"]);


});


// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo "404 Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:

        $controller = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];

        /*
         * Building given Controller and calling method
         */
        $response = (new $controller($container))->$method($vars);

        $twig = new Environment(new FilesystemLoader('app/Views'));


        if ($response instanceof View) {
            try {
                echo $twig->render($response->getPath(), $response->getVars());
            } catch (\Twig\Error\Error $e) {
                echo 'Twig Exception: ' . $e->getMessage();
                die;
            }
        }

        if ($response instanceof Redirect) {
            header('Location: ' . $response->getLocation());
        }

        break;
}
if (isset($_SESSION['errors']) && $httpMethod == "GET") {
    unset($_SESSION['errors']);
}