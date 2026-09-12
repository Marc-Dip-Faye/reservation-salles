<?php

namespace App\Controller;

use App\DTO\Builder\CreerReservationDTOBuilder;
use App\Repository\ReservationRepositoryInterface;
use App\Repository\SalleRepositoryInterface;
use App\Service\AnnulerReservationService;
use App\Service\CreerReservationService;
use App\Service\SalleIndisponibleException;
use App\Validation\ReservationValidator;
use DateTimeImmutable;
use InvalidArgumentException;

final class ReservationController
{
    public function __construct(
        private ReservationRepositoryInterface $reservationRepository,
        private SalleRepositoryInterface $salleRepository,
        private ReservationValidator $validator,
        private CreerReservationService $creerService,
        private AnnulerReservationService $annulerService
    ) {
    }

    public function index(): array
    {
        return ['view' => 'reservation/index', 'reservations' => $this->reservationRepository->lister()];
    }

    public function show(int $id): array
    {
        $reservation = $this->reservationRepository->trouver($id);

        return $reservation === null
            ? ['view' => 'error/404', 'message' => 'Réservation introuvable.']
            : ['view' => 'reservation/show', 'reservation' => $reservation];
    }

    public function create(): array
    {
        return ['view' => 'reservation/create', 'salles' => $this->salleRepository->lister(), 'data' => [], 'errors' => []];
    }

    public function store(?array $request = null): array
    {
        $data = $this->requestData($request);
        $result = $this->validator->validate($data);

        if (!$result->isValid()) {
            return ['view' => 'reservation/create', 'salles' => $this->salleRepository->lister(), 'data' => $data, 'errors' => $result->errors()];
        }

        $accepted = $result->accepted();

        try {
            $dto = (new CreerReservationDTOBuilder())
                ->salleId($accepted['salle_id'])
                ->responsable($accepted['responsable'])
                ->email($accepted['email'])
                ->motif($accepted['motif'])
                ->dateDebut(new DateTimeImmutable($accepted['date_debut']))
                ->dateFin(new DateTimeImmutable($accepted['date_fin']))
                ->build();

            $reservation = $this->creerService->executer($dto);
        } catch (SalleIndisponibleException | InvalidArgumentException $exception) {
            return ['view' => 'reservation/create', 'salles' => $this->salleRepository->lister(), 'data' => $data, 'errors' => ['reservation' => $exception->getMessage()]];
        }

        return ['redirect' => '/reservations'];
    }

    public function cancel(int $id): array
    {
        try {
            $this->annulerService->executer($id);
        } catch (\App\Service\ReservationIntrouvableException $exception) {
            return ['view' => 'error/404', 'message' => $exception->getMessage()];
        }

        return ['redirect' => '/reservations'];
    }

    private function requestData(?array $request): array
    {
        $request ??= $_POST;

        return [
            'salle_id' => filter_var($request['salle_id'] ?? null, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE),
            'responsable' => $request['responsable'] ?? null,
            'email' => $request['email'] ?? null,
            'motif' => $request['motif'] ?? null,
            'date_debut' => $request['date_debut'] ?? null,
            'date_fin' => $request['date_fin'] ?? null,
        ];
    }
}