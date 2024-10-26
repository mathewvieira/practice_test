<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class ModeloResource extends BaseResource
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
            'cor' => $this->cor,
            'caminhoes' => CaminhaoResource::collection($this->whenLoaded(relationship: 'caminhoes')),
        ]);
    }
}
