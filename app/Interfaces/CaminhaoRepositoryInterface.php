<?php

namespace App\Interfaces;

use App\Http\Resources\CaminhaoCollection;
use App\Models\Caminhao;

interface CaminhaoRepositoryInterface
{
    public function getAllPaginated(int $perPage = 5): CaminhaoCollection;

    public function findById(string $id): Caminhao;

    public function create(array $data): Caminhao;

    public function update(string $id, array $data): Caminhao;

    public function delete(string $id): void;

    public function deleteAll(bool $hasConfirmation): void;
}
