<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class MotoristaResource extends BaseResource
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
            'cpf' => $this->cpf,
            'data_nascimento' => $this->data_nascimento,
            'email' => $this->email,
            'transportadoras' => TransportadoraResource::collection($this->whenLoaded(relationship: 'transportadoras')),
            'caminhoes' => CaminhaoResource::collection($this->whenLoaded(relationship: 'caminhoes')),
        ]);
    }
}
