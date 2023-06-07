<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Traits\SortAndFilter;

class Organization extends Model
{
    use HasFactory, SortAndFilter;
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'name',
        'businessName',
        'address',
        'city',
        'state',
        'postalCode',
        'createdBy',
        'updatedBy',
    ];

    public $allowedSorts = [
        'id',
        'name',
        'businessName',
        'address',
        'city',
        'state',
        'postalCode',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public $allowedFilters = [
        'id',
        'name',
        'businessName',
        'address',
        'city',
        'state',
        'postalCode',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public function branchs(): HasMany
    {
        return $this->hasMany(Branch::class);
    }
}
