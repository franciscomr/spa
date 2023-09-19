<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SortAndFilter;

class PhonePlan extends Model
{
    use HasFactory, SortAndFilter;
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'phone_company_id',
        'name',
        'data',
        'startDate',
        'expirationDate',
        'createdBy',
        'updatedBy',
    ];

    public $allowedSorts = [
        'id',
        'phone_company_id',
        'name',
        'data',
        'startDate',
        'expirationDate',
        'createdBy',
        'updatedBy',
    ];

    public $allowedFilters = [
        'id',
        'phone_company_id',
        'name',
        'data',
        'startDate',
        'expirationDate',
        'createdBy',
        'updatedBy',
    ];

    public $relationshipFields = [
        'phone_company_id',
    ];

    public function phoneCompany(): BelongsTo
    {
        return $this->belongsTo(PhoneCompany::class);
    }
}
