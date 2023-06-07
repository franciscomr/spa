<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'organizations',
            'attributes' => [
                'id' =>  $this->resource->id,
                'name' => $this->resource->name,
                'businessName' => $this->resource->businessName,
                'address' => $this->resource->address,
                'city' => $this->resource->city,
                'state' => $this->resource->state,
                'postalCode' => $this->resource->postalCode,
                'createdBy' => $this->resource->createdBy,
                'updatedBy' => $this->resource->updatedBy,
                'createdAt' => $this->resource->createdAt,
                'updatedAt' => $this->resource->updatedAt
            ],
        ];
    }
}
