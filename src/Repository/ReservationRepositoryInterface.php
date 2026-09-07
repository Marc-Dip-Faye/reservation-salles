<?php

namespace App\Repository;

use App\DTO\CreerReservationDTO;
use App\Model\Reservation;
use DateTimeImmutable;

interface ReservationRepositoryInterface
{
	/** @return Reservation[] */
	public function lister(): array;

	public function trouver(int $id): ?Reservation;

	public function aUnConflit(
		int $salleId,
		DateTimeImmutable $dateDebut,
		DateTimeImmutable $dateFin,
		?int $reservationId = null
	): bool;

	public function enregistrer(CreerReservationDTO $dto): Reservation;

	public function annuler(int $id): bool;
}
