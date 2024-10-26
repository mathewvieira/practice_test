<?php

namespace App\Interfaces;

use App\Http\Resources\TransportadoraCollection;
use App\Models\Transportadora;

interface TransportadoraRepositoryInterface
{
    public function getAllPaginated(int $perPage = 5): TransportadoraCollection;

    public function findById(string $id): Transportadora;

    public function create(array $data): Transportadora;

    public function update(string $id, array $data): Transportadora;

    public function delete(string $id): void;

    public function deleteAll(bool $hasConfirmation): void;
}
