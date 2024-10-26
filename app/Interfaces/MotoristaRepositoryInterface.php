<?php

namespace App\Interfaces;

use App\Http\Resources\MotoristaCollection;
use App\Models\Motorista;

interface MotoristaRepositoryInterface
{
    public function getAllPaginated(int $perPage = 5): MotoristaCollection;

    public function findById(string $id): Motorista;

    public function create(array $data): Motorista;

    public function update(string $id, array $data): Motorista;

    public function delete(string $id): void;

    public function deleteAll(bool $hasConfirmation): void;
}
