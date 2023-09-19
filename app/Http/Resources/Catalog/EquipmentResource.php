<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'equipments',
            'attributes' => [
                'id' => $this->resource->id,
                'name' => $this->resource->name,
                'createdBy' => $this->resource->createdBy,
                'updatedBy' => $this->resource->updatedBy,
                'createdAt' => $this->resource->createdAt,
                'updatedAt' => $this->resource->updatedAt
            ],
            'relatedAttributes' => [
                'category_id' => $this->resource->category->id
            ],
            'relationships' => [
                'categories' => [
                    'data' => [
                        'id' => $this->resource->category->id,
                        'name' => $this->resource->category->name
                    ]
                ]
            ]
        ];
    }
}
