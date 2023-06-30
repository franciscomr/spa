<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PositionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'positions',
            'attributes' => [
                'id' => $this->resource->id,
                'name' => $this->resource->name,
                'createdBy' => $this->resource->createdBy,
                'updatedBy' => $this->resource->updatedBy,
                'createdAt' => $this->resource->createdAt,
                'updatedAt' => $this->resource->updatedAt
            ],
            'relatedAttributes' => [
                'department_id' => $this->resource->department->id
            ],
            'relationships' => [
                'departments' => [
                    'data' => [
                        'id' => $this->resource->department->id,
                        'name' => $this->resource->department->name
                    ]
                ]
            ]
        ];
    }
}
