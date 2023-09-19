<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhonePlanExport extends JsonResource
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
            'Nombre' => $this->resource->name,
            'Datos (GB)' => $this->resource->data,
            'Fecha de Inicio' => $this->resource->startDate,
            'Fecha de vencimiento' => $this->resource->expirationDate,
            'Creado Por' => $this->resource->createdBy,
            'Actualizado Por' => $this->resource->updatedBy,
            'Creado a las' => $this->resource->createdAt,
            'Actualizado a las' => $this->resource->updatedAt

        ];
    }
}
