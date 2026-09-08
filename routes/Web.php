<?php

use FastRoute\RouteCollector;

return function (RouteCollector $routes) {
    $routes->get('/', static fn (): array => ['view' => 'dashboard/dashboard']);

    $routes->get('/salle', static fn (): array => ['view' => 'salle/index']);
    $routes->get('/salles', static fn (): array => ['view' => 'salle/index']);
    $routes->get('/salles/create', static fn (): array => ['view' => 'salle/form']);
    $routes->post('/salles', static fn (): array => ['view' => 'salle/index']);

    $routes->get('/salles/{id:\d+}', static fn (): array => ['view' => 'salle/show']);
    $routes->get('/salles/{id:\d+}/edit', static fn (): array => ['view' => 'salle/form']);
    $routes->post('/salles/{id:\d+}/edit', static fn (): array => ['view' => 'salle/form']);

    $routes->get('/reservations', static fn (): array => ['view' => 'reservation/index']);
    $routes->get('/reservations/create', static fn (): array => ['view' => 'reservation/form']);
    $routes->post('/reservations', static fn (): array => ['view' => 'reservation/index']);

    $routes->get('/reservations/{id:\d+}', static fn (): array => ['view' => 'reservation/show']);
    $routes->post('/reservations/{id:\d+}/cancel', static fn (): array => ['view' => 'reservation/show']);
};