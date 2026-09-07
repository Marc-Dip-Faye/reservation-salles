<?php

namespace App\Service;

use App\Model\Reservation;
use App\Repository\ReservationRepositoryInterface;

final class AnnulerReservationService
{
    public function __construct(
        private ReservationRepositoryInterface $reservationRepository
    ) {
    }

    public function executer(int $id): Reservation
    {
        $reservation = $this->reservationRepository->trouver($id);

        if ($reservation === null) {
            throw new ReservationIntrouvableException($id);
        }

        $this->reservationRepository->annuler($id);

        return $reservation;
    }
}