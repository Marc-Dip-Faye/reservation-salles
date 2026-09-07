<?php

namespace App\Validation;

class ValidationResult
{
	public function __construct(
		private readonly array $errors,
		private readonly array $acceptedData
	) {
	}

	public function isValid(): bool
	{
		return $this->errors === [];
	}

	public function errors(): array
	{
		return $this->errors;
	}

	public function accepted(): array
	{
		return $this->acceptedData;
	}
}
