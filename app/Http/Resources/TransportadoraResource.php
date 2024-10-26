<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class TransportadoraResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array_merge($this->baseAttributes(), [
            'nome' => $this->nome,
            'cnpj' => $this->cnpj,
            'status' => $this->status,
            'motoristas' => MotoristaResource::collection($this->whenLoaded('motoristas')),
        ]);
    }
}
