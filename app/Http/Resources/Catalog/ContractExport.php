<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractExport extends JsonResource
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
            'Tipo de contrato' => $this->resource->contractType->name,
            'Nombre del contrato' => $this->resource->name,
            'NUmero de Factura' => $this->resource->billNumber,
            'NUmero de Addendum' => $this->resource->addendumNumber,
            'Proveedor' => $this->resource->vendor,
            'Fecha de la Factura' => $this->resource->billDate,
            'Fecha de Inicio de contrato' => $this->resource->startDate,
            'Fecha de vencimiento de contrato' => $this->resource->expirationDate,
            'Creado Por' => $this->resource->createdBy,
            'Actualizado Por' => $this->resource->updatedBy,
            'Creado a las' => $this->resource->createdAt,
            'Actualizado a las' => $this->resource->updatedAt
        ];
    }
}
