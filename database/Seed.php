<?php

require_once __DIR__ . '/../config/Database.php';

use App\Model\Salle;

$salles = [
	[
		'nom' => 'Amphithéâtre A',
		'batiment' => 'A',
		'capacite' => 250,
		'type' => 'amphitheatre',
		'active' => true,
	],
	[
		'nom' => 'Salle B12',
		'batiment' => 'B',
		'capacite' => 40,
		'type' => 'cours',
		'active' => true,
	],
	[
		'nom' => 'Laboratoire Chimie',
		'batiment' => 'C',
		'capacite' => 24,
		'type' => 'laboratoire',
		'active' => true,
	],
	[
		'nom' => 'Salle Informatique 1',
		'batiment' => 'B',
		'capacite' => 30,
		'type' => 'informatique',
		'active' => true,
	],
	[
		'nom' => 'Salle de réunion',
		'batiment' => 'A',
		'capacite' => 12,
		'type' => 'reunion',
		'active' => true,
	],
];

foreach ($salles as $salle) {
	Salle::updateOrCreate(
		['nom' => $salle['nom']],
		$salle
	);
}

echo count($salles) . " salles ont été ajoutées ou mises à jour." . PHP_EOL;
