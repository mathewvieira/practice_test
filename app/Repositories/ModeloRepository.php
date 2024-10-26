<?php

namespace App\Repositories;

use App\Http\Resources\ModeloCollection;
use App\Interfaces\ModeloRepositoryInterface;
use App\Models\Modelo;

class ModeloRepository implements ModeloRepositoryInterface
{
    public function getAllPaginated(int $perPage = 5): ModeloCollection
    {
        ($perPage < 1) ? $perPage = 1 : (($perPage > 35) ? $perPage = 35 : $perPage);

        return new ModeloCollection(Modelo::with(['caminhoes'])->paginate($perPage));
    }

    public function findById(string $id): Modelo
    {
        return Modelo::with('caminhoes')->findOrFail($id);
    }

    public function create(array $data): Modelo
    {
        return Modelo::firstOrCreate($data);
    }

    public function update(string $id, array $data): Modelo
    {
        $modelo = $this->findById($id);
        $modelo->update($data);
        return $modelo;
    }

    public function delete(string $id): void
    {
        $this->findById($id)->delete();
    }

    public function deleteAll(bool $hasConfirmation): void
    {
        if ($hasConfirmation)
            Modelo::query()->delete();
    }
}
