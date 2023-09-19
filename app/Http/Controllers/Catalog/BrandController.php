<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Brand;
use App\Http\Requests\Catalog\BrandRequest;
use App\Http\Resources\Catalog\BrandExport;
use App\Http\Resources\Catalog\BrandResource;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Brand::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
        return BrandResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $brand = Brand::create($request->validated());
        return response()->json([
            BrandResource::make($brand)
        ], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return response()->json([
            'data' =>  BrandResource::make($brand)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        Brand::where('id', $brand->id)->update($request->validated());
        $brand_updated = Brand::findOrFail($brand->id);
        return response()->json([
            BrandResource::make($brand_updated)
        ]);
    }

    /**
     * Export search data to Excel .
     */
    public function export()
    {
        $categories = Brand::applySortAndFilter(request('sort'), request('filter'))->get();
        $export = BrandExport::collection($categories);
        return response()->json(
            ['data' => $export]
        );
    }
}
