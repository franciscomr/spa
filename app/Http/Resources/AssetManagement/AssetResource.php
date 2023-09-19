<?php

namespace App\Http\Resources\AssetManagement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'assets',
            'attributes' => [
                'id' =>  $this->resource->id,
                'serialNumber' => $this->resource->serialNumber,
                'charger' => $this->resource->charger,
                'isActive' => $this->resource->isActive,
                'createdBy' => $this->resource->createdBy,
                'updatedBy' => $this->resource->updatedBy,
                'createdAt' => $this->resource->createdAt,
                'updatedAt' => $this->resource->updatedAt,
            ],
            'relatedAttributes' => [
                'contract_id' => $this->resource->contract->id,
                'branch_id' => $this->resource->branch->id,
                'category_id' => $this->resource->category->id,
                'equipment_model_id' => $this->resource->equipment_model->id,
                'asset_condition_id' => $this->resource->asset_condition->id,
                'asset_disposal_reason_id' => $this->resource->asset_disposal_reason->id,
            ],
            'relationships' => [
                'contracts' => [
                    'data' => [
                        'id' => $this->resource->contract->id,
                        'name' => $this->resource->contract->name,
                    ]
                ],
                'branches' => [
                    'data' => [
                        'id' => $this->resource->branch->id,
                        'name' => $this->resource->branch->name,
                    ]
                ],
                'categories' => [
                    'data' => [
                        'id' => $this->resource->category->id,
                        'name' => $this->resource->category->name,
                    ]
                ],
                'equipment_models' => [
                    'data' => [
                        'id' => $this->resource->equipment_model->id,
                        'name' => $this->resource->equipment_model->name,
                    ]
                ],
                'asset_conditions' => [
                    'data' => [
                        'id' => $this->resource->asset_condition->id,
                        'name' => $this->resource->asset_condition->name,
                    ]
                ],
                'asset_disposal_reasons' => [
                    'data' => [
                        'id' => $this->resource->asset_disposal_reason->id,
                        'name' => $this->resource->asset_disposal_reason->name,
                    ]
                ]
            ],
        ];
    }
}
