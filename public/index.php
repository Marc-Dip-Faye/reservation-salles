<?php

require_once __DIR__ . '/../vendor/autoload.php';

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

$dispatcher = simpleDispatcher(function (RouteCollector $routes): void {
	(require __DIR__ . '/../routes/Web.php')($routes);
});

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$route = $dispatcher->dispatch($method, $uri);

switch ($route[0]) {
	case Dispatcher::NOT_FOUND:
		http_response_code(404);
		render(['view' => 'error/404']);
		return;

	case Dispatcher::METHOD_NOT_ALLOWED:
		http_response_code(405);
		header('Allow: ' . implode(', ', $route[1]));
		render(['view' => 'error/405']);
		return;
}

[$handler, $variables] = [$route[1], $route[2]];
$result = $handler(...array_values($variables));
render($result);

function render(array $result): void
{
	$view = $result['view'] ?? null;
	$viewFiles = [
		'dashboard/dashboard' => 'layout/base.php',
		'salle/index' => 'salle/index.php',
		'salle/show' => 'salle/show.php',
		'salle/form' => 'salle/form.php',
		'salle/create' => 'salle/form.php',
		'salle/edit' => 'salle/form.php',
		'reservation/index' => 'reservation/index.php',
		'reservation/show' => 'reservation/show.php',
		'reservation/form' => 'reservation/form.php',
		'reservation/create' => 'reservation/form.php',
		'error/404' => 'error/404.php',
		'error/405' => 'error/405.php',
	];

	$file = isset($viewFiles[$view]) ? __DIR__ . '/../templates/' . $viewFiles[$view] : null;

	if ($file === null || !is_file($file)) {
		http_response_code(500);
		echo 'Vue non configurée.';
		return;
	}

	extract($result, EXTR_SKIP);
	require $file;
}