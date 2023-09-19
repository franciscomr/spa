<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Equipment;
use App\Http\Resources\Catalog\EquipmentResource;
use App\Http\Resources\Catalog\EquipmentExport;
use App\Http\Requests\Catalog\EquipmentRequest;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = Equipment::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
        return EquipmentResource::collection($equipments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipmentRequest $request)
    {
        $equipment = Equipment::create($request->validated());

        return response()->json([
            EquipmentResource::make($equipment)
        ], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $equipment = Equipment::findOrFail($id);
        return response()->json([
            'data' =>  EquipmentResource::make($equipment)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipmentRequest $request, Equipment $equipment)
    {
        Equipment::where('id', $equipment->id)->update($request->validated());
        $equipment_updated = Equipment::findOrFail($equipment->id);
        return response()->json([
            EquipmentResource::make($equipment_updated)
        ]);
    }

    /**
     * Export search data to Excel .
     */
    public function export()
    {
        $equipments = Equipment::applySortAndFilter(request('sort'), request('filter'))->get();
        $export = EquipmentExport::collection($equipments);
        return response()->json(
            ['data' => $export]
        );
    }
}
