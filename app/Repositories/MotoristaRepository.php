<?php

namespace App\Repositories;

use App\Http\Resources\MotoristaCollection;
use App\Interfaces\MotoristaRepositoryInterface;
use App\Models\Motorista;

class MotoristaRepository implements MotoristaRepositoryInterface
{
    public function getAllPaginated(int $perPage = 5): MotoristaCollection
    {
        ($perPage < 1) ? $perPage = 1 : (($perPage > 35) ? $perPage = 35 : $perPage);

        return new MotoristaCollection(Motorista::with(['transportadoras', 'caminhoes'])->paginate(99));
    }

    public function findById(string $id): Motorista
    {
        return Motorista::with(['transportadoras', 'caminhoes'])->findOrFail($id);
    }

    public function create(array $data): Motorista
    {
        return Motorista::firstOrCreate($data);
    }

    public function update(string $id, array $data): Motorista
    {
        $motorista = $this->findById($id);
        $motorista->update($data);
        return $motorista;
    }

    public function delete(string $id): void
    {
        $this->findById($id)->delete();
    }

    public function deleteAll(bool $hasConfirmation): void
    {
        if ($hasConfirmation)
            Motorista::query()->delete();
    }
}
