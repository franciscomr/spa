<?php

namespace App\Models\AssetManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalog\Contract;
use App\Models\Catalog\Branch;
use App\Models\Catalog\Category;
use App\Models\Catalog\EquipmentModel;
use App\Models\Traits\SortAndFilter;

class Asset extends Model
{
    use HasFactory, SortAndFilter;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'contract_id',
        'branch_id',
        'category_id',
        'equipment_model_id',
        'serialNumber',
        'charger',
        'isActive',
        'asset_condition_id',
        'asset_disposal_reason_id',
        'createdBy',
        'updatedBy',
    ];

    public $allowedSorts = [
        'id',
        'contract_id',
        'branch_id',
        'category_id',
        'equipment_model_id',
        'serialNumber',
        'charger',
        'isActive',
        'asset_condition_id',
        'asset_disposal_reason_id',
        'createdBy',
        'updatedBy',
    ];

    public $allowedFilters = [
        'id',
        'contract_id',
        'branch_id',
        'category_id',
        'equipment_model_id',
        'serialNumber',
        'charger',
        'isActive',
        'asset_condition_id',
        'asset_disposal_reason_id',
        'createdBy',
        'updatedBy',
    ];

    public $relationshipFields = [
        'contract_id',
        'branch_id',
        'category_id',
        'equipment_model_id',
        'asset_condition_id',
        'asset_disposal_reason_id',
    ];

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function equipment_model(): BelongsTo
    {
        return $this->belongsTo(EquipmentModel::class);
    }

    public function asset_condition(): BelongsTo
    {
        return $this->belongsTo(AssetCondition::class);
    }

    public function asset_disposal_reason(): BelongsTo
    {
        return $this->belongsTo(AssetDisposalReason::class);
    }
}
