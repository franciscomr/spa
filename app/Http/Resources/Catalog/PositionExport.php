<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PositionExport extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>  $this->resource->id,
            'Departamento' => $this->resource->department->name,
            'Puesto' => $this->resource->name,
            'Creado Por' => $this->resource->createdBy,
            'Actualizado Por' => $this->resource->updatedBy,
            'Creado a las' => $this->resource->createdAt,
            'Actualizado a las' => $this->resource->updatedAt
        ];
    }
}
