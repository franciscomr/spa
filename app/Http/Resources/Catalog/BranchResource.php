<?php

namespace App\Http\Resources\Catalog;

use App\Models\Catalog\Organization;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'branches',
            'attributes' => [
                'id' =>  $this->resource->id,
                'name' => $this->resource->name,
                'address' => $this->resource->address,
                'city' => $this->resource->city,
                'state' => $this->resource->state,
                'postalCode' => $this->resource->postalCode,
                'createdBy' => $this->resource->createdBy,
                'updatedBy' => $this->resource->updatedBy,
                'createdAt' => $this->resource->createdAt,
                'updatedAt' => $this->resource->updatedAt,
            ],
            'relatedAttributes' => [
                'organization_id' => $this->resource->organization->id
            ],
            'relationships' => [
                'organizations' => [
                    'data' => [
                        'id' => $this->resource->organization->id,
                        'name' => $this->resource->organization->name,
                    ]
                ]
            ],
        ];
    }
}
