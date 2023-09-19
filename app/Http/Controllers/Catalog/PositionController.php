<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Position;
use App\Http\Resources\Catalog\PositionResource;
use App\Http\Resources\Catalog\PositionExport;
use App\Http\Requests\Catalog\PositionRequest;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
        return PositionResource::collection($positions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PositionRequest $request)
    {
        $position = Position::create($request->validated());
        return response()->json([
            PositionResource::make($position)
        ], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $position = Position::findOrFail($id);
        return response()->json([
            'data' =>  PositionResource::make($position)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PositionRequest $request, Position $position)
    {
        Position::where('id', $position->id)->update($request->validated());
        $position_updated = Position::findOrFail($position->id);
        return response()->json([
            PositionResource::make($position_updated)
        ]);
    }

    public function export()
    {
        $positions = Position::applySortAndFilter(request('sort'), request('filter'))->get();
        $export = PositionExport::collection($positions);
        return response()->json(
            ['data' => $export]
        );
    }
}
