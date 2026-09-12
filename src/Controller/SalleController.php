<?php

namespace App\Controller;

use App\DTO\Builder\CreerSalleDTOBuilder;
use App\Repository\SalleRepositoryInterface;
use App\Validation\SalleValidator;

final class SalleController
{
    public function __construct(
        private SalleRepositoryInterface $salleRepository,
        private SalleValidator $validator
    ) {
    }

    public function index(): array
    {
        return ['view' => 'salle/index', 'salles' => $this->salleRepository->lister()];
    }

    public function show(int $id): array
    {
        $salle = $this->salleRepository->trouver($id);

        return $salle === null
            ? ['view' => 'error/404', 'message' => 'Salle introuvable.']
            : ['view' => 'salle/show', 'salle' => $salle];
    }

    public function create(): array
    {
        return ['view' => 'salle/form', 'mode' => 'create', 'data' => [], 'errors' => []];
    }

    public function store(?array $request = null): array
    {
        $data = $this->requestData($request);
        $result = $this->validator->validate($data);

        if (!$result->isValid()) {
            return ['view' => 'salle/form', 'mode' => 'create', 'data' => $data, 'errors' => $result->errors()];
        }

        $dto = (new CreerSalleDTOBuilder())
            ->nom($result->accepted()['nom'])
            ->batiment($result->accepted()['batiment'])
            ->capacite($result->accepted()['capacite'])
            ->type($result->accepted()['type'])
            ->active($result->accepted()['active'])
            ->build();

        $salle = $this->salleRepository->enregistrer($dto);

        return ['redirect' => '/salles/' . $salle->getKey()];
    }

    public function edit(int $id): array
    {
        $salle = $this->salleRepository->trouver($id);

        return $salle === null
            ? ['view' => 'error/404', 'message' => 'Salle introuvable.']
            : ['view' => 'salle/form', 'mode' => 'edit', 'salle' => $salle, 'errors' => []];
    }

    public function update(int $id, ?array $request = null): array
    {
        $data = $this->requestData($request);
        $result = $this->validator->validate($data);

        if (!$result->isValid()) {
            return ['view' => 'salle/form', 'mode' => 'edit', 'salle' => $this->salleRepository->trouver($id), 'data' => $data, 'errors' => $result->errors()];
        }

        $accepted = $result->accepted();
        $dto = (new CreerSalleDTOBuilder())
            ->nom($accepted['nom'])
            ->batiment($accepted['batiment'])
            ->capacite($accepted['capacite'])
            ->type($accepted['type'])
            ->active($accepted['active'])
            ->build();
        $salle = $this->salleRepository->modifier($id, $dto);

        return $salle === null
            ? ['view' => 'error/404', 'message' => 'Salle introuvable.']
            : ['redirect' => '/salles/' . $salle->getKey()];
    }

    private function requestData(?array $request): array
    {
        $request ??= $_POST;

        return [
            'nom' => $request['nom'] ?? null,
            'batiment' => $request['batiment'] ?? null,
            'capacite' => filter_var($request['capacite'] ?? null, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE),
            'type' => $request['type'] ?? null,
            'active' => array_key_exists('active', $request)
                ? filter_var($request['active'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)
                : null,
        ];
    }
}
