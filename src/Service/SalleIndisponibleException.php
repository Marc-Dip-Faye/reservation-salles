<?php

namespace App\Service;

use RuntimeException;

final class SalleIndisponibleException extends RuntimeException
{
	public function __construct(int $salleId)
	{
		parent::__construct("La salle {$salleId} est indisponible.");
	}
}
