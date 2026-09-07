<?php

namespace App\Repository;

use App\DTO\CreerReservationDTO;
use App\Model\Reservation;
use DateTimeImmutable;

final class EloquentReservationRepository implements ReservationRepositoryInterface
{
	public function lister(): array
	{
		return Reservation::query()->get()->all();
	}

	public function trouver(int $id): ?Reservation
	{
		return Reservation::query()->find($id);
	}

	public function aUnConflit(
		int $salleId,
		DateTimeImmutable $dateDebut,
		DateTimeImmutable $dateFin,
		?int $reservationId = null
	): bool {
		$query = Reservation::query()
			->where('salle_id', $salleId)
			->where('statut', '!=', 'annulee')
			->where('date_debut', '<', $dateFin)
			->where('date_fin', '>', $dateDebut);

		if ($reservationId !== null) {
			$query->whereKeyNot($reservationId);
		}

		return $query->exists();
	}

	public function enregistrer(CreerReservationDTO $dto): Reservation
	{
		$reservation = new Reservation([
			'salle_id' => $dto->salleId,
			'responsable' => $dto->responsable,
			'email' => $dto->email,
			'motif' => $dto->motif,
			'date_debut' => $dto->dateDebut,
			'date_fin' => $dto->dateFin,
			'statut' => 'confirmee',
		]);

		$reservation->save();

		return $reservation;
	}

	public function annuler(int $id): bool
	{
		$reservation = $this->trouver($id);

		if ($reservation === null) {
			return false;
		}

		$reservation->statut = 'annulee';

		return $reservation->save();
	}
}
