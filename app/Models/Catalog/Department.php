<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Traits\SortAndFilter;

class Department extends Model
{
    use HasFactory, SortAndFilter;
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'name',
        'createdBy',
        'updatedBy',
    ];

    public $allowedSorts = [
        'id',
        'name',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public $allowedFilters = [
        'id',
        'name',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }
}
