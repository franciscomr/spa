<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Employee;
use App\Http\Resources\Catalog\EmployeeResource;
use App\Http\Resources\Catalog\EmployeeExport;
use App\Http\Requests\Catalog\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
        return EmployeeResource::collection($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());
        return response()->json([
            EmployeeResource::make($employee)
        ], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json([
            'data' =>  EmployeeResource::make($employee)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        Employee::where('id', $employee->id)->update($request->validated());
        $employee_updated = Employee::findOrFail($employee->id);
        return response()->json([
            EmployeeResource::make($employee_updated)
        ]);
    }

    /**
     * Export the specified resource.
     */
    public function export()
    {
        $employees = Employee::applySortAndFilter(request('sort'), request('filter'))->get();
        $export = EmployeeExport::collection($employees);
        return response()->json(
            ['data' => $export]
        );
    }
}
