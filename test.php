<?php

require __DIR__ . '/vendor/autoload.php';

// Initialise Capsule + Eloquent + connexion MySQL
require __DIR__ . '/config/Database.php';

use App\Repository\EloquentSalleRepository;

$repository = new EloquentSalleRepository();

$salles = $repository->lister();

var_dump($salles);