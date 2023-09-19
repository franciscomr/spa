<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SortAndFilter;

class Contract extends Model
{
    use HasFactory, SortAndFilter;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'contract_type_id',
        'name',
        'billNumber',
        'addendumNumber',
        'vendor',
        'billDate',
        'startDate',
        'expirationDate',
        'createdBy',
        'updatedBy',
    ];

    public $allowedSorts = [
        'id',
        'contract_type_id',
        'name',
        'billNumber',
        'addendumNumber',
        'vendor',
        'billDate',
        'startDate',
        'expirationDate',
        'createdBy',
        'updatedBy',
    ];

    public $allowedFilters = [
        'id',
        'contract_type_id',
        'name',
        'billNumber',
        'addendumNumber',
        'vendor',
        'billDate',
        'startDate',
        'expirationDate',
        'createdBy',
        'updatedBy',
    ];

    public $relationshipFields = [
        'contract_type_id',
    ];

    public function contractType(): BelongsTo
    {
        return $this->belongsTo(ContractType::class);
    }
}
