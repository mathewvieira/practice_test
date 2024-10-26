<?php

namespace App\Interfaces;

use App\Http\Resources\ModeloCollection;
use App\Models\Modelo;

interface ModeloRepositoryInterface
{
    public function getAllPaginated(int $perPage = 5): ModeloCollection;

    public function findById(string $id): Modelo;

    public function create(array $data): Modelo;

    public function update(string $id, array $data): Modelo;

    public function delete(string $id): void;

    public function deleteAll(bool $hasConfirmation): void;
}
