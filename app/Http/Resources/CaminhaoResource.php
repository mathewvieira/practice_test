<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class CaminhaoResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array_merge($this->baseAttributes(), [
            'placa' => $this->placa,
            'modelo' => new ModeloResource($this->whenLoaded(relationship: 'modelo')),
            'motorista' => new MotoristaResource($this->whenLoaded(relationship: 'motorista')),
        ]);
    }
}
