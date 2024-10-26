<?php

namespace App\Repositories;

use App\Http\Resources\TransportadoraCollection;
use App\Interfaces\TransportadoraRepositoryInterface;
use App\Models\Transportadora;

class TransportadoraRepository implements TransportadoraRepositoryInterface
{
    public function getAllPaginated(int $perPage = 5): TransportadoraCollection
    {
        ($perPage < 1) ? $perPage = 1 : (($perPage > 35) ? $perPage = 35 : $perPage);

        return new TransportadoraCollection(Transportadora::with('motoristas')->paginate($perPage));
    }

    public function findById(string $id): Transportadora
    {
        return Transportadora::with('motoristas')->findOrFail($id);
    }

    public function create(array $data): Transportadora
    {
        return Transportadora::firstOrCreate($data);
    }

    public function update(string $id, array $data): Transportadora
    {
        $transportadora = $this->findById($id);
        $transportadora->update($data);
        return $transportadora;
    }

    public function delete(string $id): void
    {
        $this->findById($id)->delete();
    }

    public function deleteAll(bool $hasConfirmation): void
    {
        if ($hasConfirmation)
            Transportadora::query()->delete();
    }
}
