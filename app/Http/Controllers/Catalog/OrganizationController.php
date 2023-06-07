<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Organization;
use App\Http\Requests\Catalog\OrganizationRequest;
use App\Http\Resources\Catalog\OrganizationResource;
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
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function export()
    {
        $organizations = Organization::applySortAndFilter(request('sort'), request('filter'))->get();
        return response()->json(
            ['data' => $organizations]
        );
    }
}
