<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Organization;
use App\Http\Requests\Catalog\OrganizationRequest;
use App\Http\Resources\Catalog\OrganizationResource;
use App\Http\Resources\Catalog\OrganizationExport;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
        return OrganizationResource::collection($organizations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationRequest $request)
    {
        $organization = Organization::create($request->validated());
        return response()->json([
            OrganizationResource::make($organization)
        ], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $organization = Organization::findOrFail($id);
        return response()->json([
            'data' =>  OrganizationResource::make($organization)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganizationRequest $request, Organization $organization)
    {
        Organization::where('id', $organization->id)->update($request->validated());
        $organization_updated = Organization::findOrFail($organization->id);
        return response()->json([
            OrganizationResource::make($organization_updated)
        ]);
    }

    /**
     * Export search data to Excel .
     */
    public function export()
    {
        $organizations = Organization::applySortAndFilter(request('sort'), request('filter'))->get();
        $export = OrganizationExport::collection($organizations);
        return response()->json(
            ['data' => $export]
        );
    }
}
