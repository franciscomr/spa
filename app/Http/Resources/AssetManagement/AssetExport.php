<?php

namespace App\Http\Resources\AssetManagement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssetExport extends JsonResource
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
            'contract_id' => $this->resource->contract->name,
            'branch_id' => $this->resource->branch->name,
            'category_id' => $this->resource->category->name,
            'equipment_model_id' => $this->resource->equipment_model->name,
            'serialNumber' => $this->resource->serialNumber,
            'charger' => $this->resource->charger,
            'isActive' => $this->resource->isActive,
            'asset_condition_id' => $this->resource->asset_condition->name,
            'asset_disposal_reason_id' => $this->resource->asset_disposal_reason->name,
            'createdBy' => $this->resource->createdBy,
            'updatedBy' => $this->resource->updatedBy,
            'createdAt' => $this->resource->createdAt,
            'updatedAt' => $this->resource->updatedAt,
        ];
    }
}
