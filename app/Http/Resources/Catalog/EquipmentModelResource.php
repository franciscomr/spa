<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentModelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'equipmentModels',
            'attributes' => [
                'id' =>  $this->resource->id,
                'name' => $this->resource->name,
                'attributes' => $this->resource->attributes,
                'createdBy' => $this->resource->createdBy,
                'updatedBy' => $this->resource->updatedBy,
                'createdAt' => $this->resource->createdAt,
                'updatedAt' => $this->resource->updatedAt,
            ],
            'relatedAttributes' => [
                'equipment_id' => $this->resource->equipment->id,
                'brand_id' => $this->resource->brand->id
            ],
            'relationships' => [
                'equipment' => [
                    'data' => [
                        'id' => $this->resource->equipment->id,
                        'name' => $this->resource->equipment->name,
                    ]
                ],
                'brands' => [
                    'data' => [
                        'id' => $this->resource->brand->id,
                        'name' => $this->resource->brand->name,
                    ]
                ]
            ],
        ];
    }
}
