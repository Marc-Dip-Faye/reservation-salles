<?php

require_once __DIR__ . '/../config/Database.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$migrationFiles = glob(__DIR__ . '/migrations/*.php');
sort($migrationFiles);

foreach ($migrationFiles as $migrationFile) {
    $migration = require $migrationFile;
    $table = basename($migrationFile, '.php');

    if (str_contains($table, 'salles') && !Capsule::schema()->hasTable('salles')) {
        $migration->up();
        echo "Migration salles exécutée." . PHP_EOL;
    }

    if (str_contains($table, 'reservations') && !Capsule::schema()->hasTable('reservations')) {
        $migration->up();
        echo "Migration reservations exécutée." . PHP_EOL;
    }
}