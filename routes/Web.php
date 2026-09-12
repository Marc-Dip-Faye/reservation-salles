<?php

use App\Controller\ReservationController;
use App\Controller\SalleController;
use FastRoute\RouteCollector;

return function (
    RouteCollector $routes,
    SalleController $salleController,
    ReservationController $reservationController
): void {
    $routes->get('/', static fn (): array => ['view' => 'dashboard/dashboard']);

    $routes->get('/salle', fn (): array => $salleController->index());
    $routes->get('/salles', fn (): array => $salleController->index());
    $routes->get('/salles/create', fn (): array => $salleController->create());
    $routes->post('/salles', fn (): array => $salleController->store());

    $routes->get('/salles/{id:\d+}', fn (int $id): array => $salleController->show($id));
    $routes->get('/salles/{id:\d+}/edit', fn (int $id): array => $salleController->edit($id));
    $routes->post('/salles/{id:\d+}/edit', fn (int $id): array => $salleController->update($id));

    $routes->get('/reservations', fn (): array => $reservationController->index());
    $routes->get('/reservations/create', fn (): array => $reservationController->create());
    $routes->post('/reservations', fn (): array => $reservationController->store());

    $routes->get('/reservations/{id:\d+}', fn (int $id): array => $reservationController->show($id));
    $routes->post('/reservations/{id:\d+}/cancel', fn (int $id): array => $reservationController->cancel($id));
};