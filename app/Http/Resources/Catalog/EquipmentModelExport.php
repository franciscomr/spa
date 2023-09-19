<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentModelExport extends JsonResource
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
            'equipment_id' => $this->resource->equipment->name,
            'brand_id' => $this->resource->brand->name,
            'name' => $this->resource->name,
            'createdBy' => $this->resource->createdBy,
            'updatedBy' => $this->resource->updatedBy,
            'createdAt' => $this->resource->createdAt,
            'updatedAt' => $this->resource->updatedAt,
        ];
    }
}
