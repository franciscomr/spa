<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Department;
use App\Http\Requests\Catalog\DepartmentRequest;
use App\Http\Resources\Catalog\DepartmentExport;
use App\Http\Resources\Catalog\departmentResource;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
        return DepartmentResource::collection($departments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $department = Department::create($request->validated());
        return response()->json([
            DepartmentResource::make($department)
        ], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return response()->json([
            'data' =>  DepartmentResource::make($department)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        Department::where('id', $department->id)->update($request->validated());
        $department_updated = Department::findOrFail($department->id);
        return response()->json([
            DepartmentResource::make($department_updated)
        ]);
    }

    /**
     * Export search data to Excel .
     */
    public function export()
    {
        $departments = Department::applySortAndFilter(request('sort'), request('filter'))->get();
        $export = DepartmentExport::collection($departments);
        return response()->json(
            ['data' => $export]
        );
    }
}
