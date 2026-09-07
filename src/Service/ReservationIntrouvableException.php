<?php

namespace App\Service;

use RuntimeException;

final class ReservationIntrouvableException extends RuntimeException
{
	public function __construct(int $reservationId)
	{
		parent::__construct("La réservation {$reservationId} est introuvable.");
	}
}
