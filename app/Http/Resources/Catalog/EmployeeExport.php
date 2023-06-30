<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeExport extends JsonResource
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
            'branch_id' => $this->resource->branch->name,
            'position_id' => $this->resource->position->name,
            'name' => $this->resource->name,
            'firstSurname' => $this->resource->firstSurname,
            'secondSurname' => $this->resource->secondSurname,
            'isActive' => $this->resource->isActive,
            'createdBy' => $this->resource->createdBy,
            'updatedBy' => $this->resource->updatedBy,
            'createdAt' => $this->resource->createdAt,
            'updatedAt' => $this->resource->updatedAt,
        ];
    }
}
