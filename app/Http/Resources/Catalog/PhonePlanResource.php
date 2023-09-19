<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhonePlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'phonePlans',
            'attributes' => [
                'id' =>  $this->resource->id,
                'name' => $this->resource->name,
                'data' => $this->resource->data,
                'startDate' => $this->resource->startDate,
                'expirationDate' => $this->resource->expirationDate,
                'createdBy' => $this->resource->createdBy,
                'updatedBy' => $this->resource->updatedBy,
                'createdAt' => $this->resource->createdAt,
                'updatedAt' => $this->resource->updatedAt,
            ],
            'relatedAttributes' => [
                'phone_company_id' => $this->resource->phoneCompany->id,
            ],
            'relationships' => [
                'phone_companies' => [
                    'data' => [
                        'id' => $this->resource->phoneCompany->id,
                        'name' => $this->resource->phoneCompany->name,
                    ]
                ]
            ],
        ];
    }
}
