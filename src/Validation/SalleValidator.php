<?php

namespace App\Validation;

use Respect\Validation\Validator as v;

class SalleValidator implements ValidatorInterface
{
	private const TYPES = [
		'cours',
		'informatique',
		'laboratoire',
		'amphitheatre',
		'reunion',
	];

	public function validate(array $data): ValidationResult
	{
		$rules = [
			'nom' => v::stringType()->notEmpty()->length(2, 100),
			'batiment' => v::stringType()->notEmpty()->length(2, 100),
			'capacite' => v::intType()->between(1, 1000),
			'type' => v::in(self::TYPES, true),
			'active' => v::boolType(),
		];

		return $this->validateFields($data, $rules);
	}

	private function validateFields(array $data, array $rules): ValidationResult
	{
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



