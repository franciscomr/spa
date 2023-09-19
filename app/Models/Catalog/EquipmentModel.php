<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SortAndFilter;

class EquipmentModel extends Model
{
    use HasFactory, SortAndFilter;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';


    protected $fillable = [
        'equipment_id',
        'brand_id',
        'employeeId',
        'name',
        'attributes',
        'createdBy',
        'updatedBy',
    ];

    public $allowedSorts = [
        'id',
        'equipment_id',
        'brand_id',
        'employeeId',
        'name',
        'attributes',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public $allowedFilters = [
        'id',
        'equipment_id',
        'brand_id',
        'employeeId',
        'name',
        'attributes',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public $relationshipFields = [
        'equipment_id',
        'brand_id'
    ];

    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
