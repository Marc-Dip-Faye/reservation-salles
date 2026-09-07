<?php

namespace App\Service;

use App\DTO\CreerReservationDTO;
use App\Model\Reservation;
use App\Repository\ReservationRepositoryInterface;
use App\Repository\SalleRepositoryInterface;
use DateTimeImmutable;
use InvalidArgumentException;

final class CreerReservationService
{
	private const DUREE_MAXIMALE_EN_SECONDES = 4 * 60 * 60;

	public function __construct(
		private SalleRepositoryInterface $salleRepository,
		private ReservationRepositoryInterface $reservationRepository,
		private ?DateTimeImmutable $maintenant = null
	) {
	}

	public function executer(CreerReservationDTO $dto): Reservation
	{
		$salle = $this->salleRepository->trouver($dto->salleId);

		if ($salle === null || !$salle->active) {
			throw new SalleIndisponibleException($dto->salleId);
		}

		if ($dto->dateDebut >= $dto->dateFin) {
			throw new InvalidArgumentException('La date de début doit précéder la date de fin.');
		}

		$duree = $dto->dateFin->getTimestamp() - $dto->dateDebut->getTimestamp();

		if ($duree > self::DUREE_MAXIMALE_EN_SECONDES) {
			throw new InvalidArgumentException('La durée de réservation ne peut pas dépasser quatre heures.');
		}

		$maintenant = $this->maintenant ?? new DateTimeImmutable();

		if ($dto->dateDebut <= $maintenant) {
			throw new InvalidArgumentException('La réservation doit commencer dans le futur.');
		}

		if ($this->reservationRepository->aUnConflit(
			$dto->salleId,
			$dto->dateDebut,
			$dto->dateFin
		)) {
			throw new SalleIndisponibleException($dto->salleId);
		}

		return $this->reservationRepository->enregistrer($dto);
	}
}
