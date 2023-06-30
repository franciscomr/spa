<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SortAndFilter;

class Employee extends Model
{
    use HasFactory, SortAndFilter;
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'branch_id',
        'position_id',
        'employeeId',
        'name',
        'firstSurname',
        'secondSurname',
        'createdBy',
        'updatedBy',
    ];

    public $allowedSorts = [
        'id',
        'branch_id',
        'position_id',
        'employeeId',
        'name',
        'firstSurname',
        'secondSurname',
        'isActive',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public $allowedFilters = [
        'id',
        'branch_id',
        'position_id',
        'employeeId',
        'name',
        'firstSurname',
        'secondSurname',
        'isActive',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
    ];

    public $relationshipFields = [
        'branch_id',
        'position_id'
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}
