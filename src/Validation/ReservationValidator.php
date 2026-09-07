<?php

namespace App\Validation;

use Respect\Validation\Validator as v;

class ReservationValidator implements ValidatorInterface
{
	public function validate(array $data): ValidationResult
	{
		$rules = [
			'salle_id' => v::intType()->positive(),
			'responsable' => v::stringType()->notEmpty()->length(2, 120),
			'email' => v::email(),
			'motif' => v::stringType()->notEmpty()->length(5, 255),
			'date_debut' => v::dateTime(),
			'date_fin' => v::dateTime(),
		];

		$errors = [];
		$acceptedData = [];

		foreach ($rules as $field => $rule) {
			if (!array_key_exists($field, $data)) {
				$errors[$field] = 'Ce champ est obligatoire.';
				continue;
			}

			if (!$rule->isValid($data[$field])) {
				$errors[$field] = 'La valeur de ce champ est invalide.';
				continue;
			}

			$acceptedData[$field] = $data[$field];
		}

		return new ValidationResult($errors, $acceptedData);
	}
}
