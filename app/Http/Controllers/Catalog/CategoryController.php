<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Category;
use App\Http\Requests\Catalog\CategoryRequest;
use App\Http\Resources\Catalog\CategoryExport;
use App\Http\Resources\Catalog\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return response()->json([
            CategoryResource::make($category)
        ], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json([
            'data' =>  CategoryResource::make($category)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        Category::where('id', $category->id)->update($request->validated());
        $category_updated = Category::findOrFail($category->id);
        return response()->json([
            CategoryResource::make($category_updated)
        ]);
    }

    /**
     * Export search data to Excel .
     */
    public function export()
    {
        $categories = Category::applySortAndFilter(request('sort'), request('filter'))->get();
        $export = CategoryExport::collection($categories);
        return response()->json(
            ['data' => $export]
        );
    }
}
