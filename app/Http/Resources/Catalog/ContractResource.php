<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'contracts',
            'attributes' => [
                'id' => $this->resource->id,
                'name' => $this->resource->name,
                'billNumber' => $this->resource->billNumber,
                'addendumNumber' => $this->resource->addendumNumber,
                'vendor' => $this->resource->vendor,
                'billDate' => $this->resource->billDate,
                'startDate' => $this->resource->startDate,
                'expirationDate' => $this->resource->expirationDate,
                'createdBy' => $this->resource->createdBy,
                'updatedBy' => $this->resource->updatedBy,
                'createdAt' => $this->resource->createdAt,
                'updatedAt' => $this->resource->updatedAt
            ],
            'relatedAttributes' => [
                'contract_type_id' => $this->resource->contractType->id
            ],
            'relationships' => [
                'contract_types' => [
                    'data' => [
                        'id' => $this->resource->contractType->id,
                        'name' => $this->resource->contractType->name
                    ]
                ]
            ]
        ];
    }
}
