<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'employees',
            'attributes' => [
                'id' =>  $this->resource->id,
                'name' => $this->resource->name,
                'firstSurname' => $this->resource->firstSurname,
                'secondSurname' => $this->resource->secondSurname,
                'isActive' => $this->resource->isActive,
                'createdBy' => $this->resource->createdBy,
                'updatedBy' => $this->resource->updatedBy,
                'createdAt' => $this->resource->createdAt,
                'updatedAt' => $this->resource->updatedAt,
            ],
            'relatedAttributes' => [
                'branch_id' => $this->resource->branch->id,
                'position_id' => $this->resource->position->id
            ],
            'relationships' => [
                'branches' => [
                    'data' => [
                        'id' => $this->resource->branch->id,
                        'name' => $this->resource->branch->name,
                    ]
                ],
                'positions' => [
                    'data' => [
                        'id' => $this->resource->position->id,
                        'name' => $this->resource->position->name,
                    ]
                ]
            ],
        ];
    }
}
