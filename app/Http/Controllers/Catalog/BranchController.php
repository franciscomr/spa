<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Branch;
use App\Http\Resources\Catalog\BranchResource;
use App\Http\Resources\Catalog\BranchExport;
use App\Http\Requests\Catalog\BranchRequest;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
        return BranchResource::collection($branches);
    }

    public function store(BranchRequest $request)
    {
        $branch = Branch::create($request->validated());
        return response()->json([
            BranchResource::make($branch)
        ], status: 201);
    }

    public function show($id)
    {
        $branch = Branch::findOrFail($id);
        return response()->json([
            'data' =>  BranchResource::make($branch)
        ]);
    }

    public function update(BranchRequest $request, Branch $branch)
    {
        Branch::where('id', $branch->id)->update($request->validated());
        $branch_updated = Branch::findOrFail($branch->id);
        return response()->json([
            BranchResource::make($branch_updated)
        ]);
    }

    public function export()
    {
        $branches = Branch::applySortAndFilter(request('sort'), request('filter'))->get();
        $export = BranchExport::collection($branches);
        return response()->json(
            ['data' => $export]
        );
    }
}
