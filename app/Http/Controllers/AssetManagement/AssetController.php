<?php

namespace App\Http\Controllers\AssetManagement;

use App\Http\Controllers\Controller;
use App\Models\AssetManagement\Asset;
use App\Http\Requests\AssetManagement\AssetRequest;
use App\Http\Resources\AssetManagement\AssetExport;
use App\Http\Resources\AssetManagement\AssetResource;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
        return AssetResource::collection($assets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssetRequest $request)
    {
        $asset = Asset::create($request->validated());
        return response()->json([
            AssetResource::make($asset)
        ], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asset = Asset::findOrFail($id);
        return response()->json([
            'data' =>  AssetResource::make($asset)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssetRequest $request, Asset $asset)
    {
        Asset::where('id', $asset->id)->update($request->validated());
        $asset_updated = Asset::findOrFail($asset->id);
        return response()->json([
            AssetResource::make($asset_updated)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function export()
    {
        $assets = Asset::applySortAndFilter(request('sort'), request('filter'))->get();
        $export = assetExport::collection($assets);
        return response()->json(
            ['data' => $export]
        );
    }
}
