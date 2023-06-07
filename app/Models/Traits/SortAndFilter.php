<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

trait SortAndFilter
{
  public function scopeApplySortAndFilter(Builder $query, $sort, $filter)
  {
    if (!property_exists($this, 'allowedFilters')) {
      abort(500, 'Please set the public property $allowedSorts inside' . get_class($this));
    }

    if (!property_exists($this, 'allowedSorts')) {
      abort(500, 'Please set the public property $allowedSorts inside' . get_class($this));
    }

    if (is_null($sort) && is_null($filter)) {
      return;
    }

    if (!is_null($sort)) {
      $sortFields = Str::of($sort)->explode(',');
      foreach ($sortFields as $sortField) {
        $direction = 'asc';
        if (Str::of($sortField)->startsWith('-')) {
          $direction = 'desc';
          $sortField = Str::of($sortField)->substr(1);
        }
        if (!collect($this->allowedSorts)->contains($sortField)) {
          abort(400, "Sort parameter {$sortField} is not allowed");
        }
        $query->orderBy($sortField, $direction);
      }
    }

    if (!is_null($filter)) {
      foreach ($filter as $filter => $value) {
        if (!collect($this->allowedFilters)->contains($filter)) {
          abort(400, "Filter parameter {$filter} is not allowed");
        }
        $query->where($filter, 'like', '%' . $value . '%');
      }
    }
  }
}
