<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\EquipmentModel;
use App\Http\Resources\Catalog\EquipmentModelResource;
use App\Http\Resources\Catalog\EquipmentModelExport;
use App\Http\Requests\Catalog\EquipmentModelRequest;
use Illuminate\Http\Request;

class EquipmentModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipment_models = EquipmentModel::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
        return EquipmentModelResource::collection($equipment_models);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipmentModelRequest $request)
    {
        $equipment_model = EquipmentModel::create($request->validated());
        return response()->json([
            EquipmentModelResource::make($equipment_model)
        ], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $equipment_model = EquipmentModel::findOrFail($id);
        return response()->json([
            'data' =>  EquipmentModelResource::make($equipment_model)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipmentModelRequest $request, EquipmentModel $equipmentModel)
    {
        EquipmentModel::where('id', $equipmentModel->id)->update($request->validated());
        $equipment_model_updated = EquipmentModel::findOrFail($equipmentModel->id);
        return response()->json([
            EquipmentModelResource::make($equipment_model_updated)
        ]);
    }

    /**
     * Export the specified resource.
     */
    public function export()
    {
        $equipment_models = EquipmentModel::applySortAndFilter(request('sort'), request('filter'))->get();
        $export = EquipmentModelExport::collection($equipment_models);
        return response()->json(
            ['data' => $export]
        );
    }

    public function attach(Request $request, $id)
    {
        $equipment_model = EquipmentModel::findOrFail($id);
        if ($request->select_file !== null) {
            $filename = $id . '.' . $request->select_file->extension();

            $request->select_file->storeAs('public/modelos', $filename);
        }

        return response()->json([
            EquipmentModelResource::make($equipment_model)
        ]);
    }
}
