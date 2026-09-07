<?php

namespace App\Repository;

use App\DTO\CreerSalleDTO;
use App\Model\Salle;

final class EloquentSalleRepository implements SalleRepositoryInterface
{
	public function lister(): array
	{
		return Salle::query()->get()->all();
	}

	public function trouver(int $id): ?Salle
	{
		return Salle::query()->find($id);
	}

	public function enregistrer(CreerSalleDTO $dto): Salle
	{
		$salle = new Salle([
			'nom' => $dto->nom,
			'batiment' => $dto->batiment,
			'capacite' => $dto->capacite,
			'type' => $dto->type,
			'active' => $dto->active,
		]);

		$salle->save();

		return $salle;
	}
}
