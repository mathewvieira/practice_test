<?php

namespace App\Repositories;

use App\Http\Resources\CaminhaoCollection;
use App\Interfaces\CaminhaoRepositoryInterface;
use App\Models\Caminhao;

class CaminhaoRepository implements CaminhaoRepositoryInterface
{
    public function getAllPaginated(int $perPage = 5): CaminhaoCollection
    {
        ($perPage < 1) ? $perPage = 1 : (($perPage > 35) ? $perPage = 35 : $perPage);

        return new CaminhaoCollection(Caminhao::with(['motorista', 'modelo'])->paginate($perPage));
    }

    public function findById(string $id): Caminhao
    {
        return Caminhao::with(['motorista', 'modelo'])->findOrFail($id);
    }

    public function create(array $data): Caminhao
    {
        return Caminhao::firstOrCreate($data);
    }

    public function update(string $id, array $data): Caminhao
    {
        $caminhao = $this->findById($id);
        $caminhao->update($data);
        return $caminhao;
    }

    public function delete(string $id): void
    {
        $this->findById($id)->delete();
    }

    public function deleteAll(bool $hasConfirmation): void
    {
        if ($hasConfirmation)
            Caminhao::query()->delete();
    }
}
