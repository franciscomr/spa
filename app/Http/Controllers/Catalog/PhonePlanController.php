<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\PhonePlan;
use App\Http\Requests\Catalog\PhonePlanRequest;
use App\Http\Resources\Catalog\PhonePlanResource;
use App\Http\Resources\Catalog\PhonePlanExport;
use Illuminate\Http\Request;

class PhonePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phone_plans = PhonePlan::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
        return PhonePlanResource::collection($phone_plans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhonePlanRequest $request)
    {
        $phone_plan = PhonePlan::create($request->validated());
        return response()->json([
            PhonePlanResource::make($phone_plan)
        ], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $phone_plan = PhonePlan::findOrFail($id);
        return response()->json([
            'data' =>  PhonePlanResource::make($phone_plan)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhonePlanRequest $request, PhonePlan $phonePlan)
    {
        PhonePlan::where('id', $phonePlan->id)->update($request->validated());
        $phone_plan_updated = PhonePlan::findOrFail($phonePlan->id);
        return response()->json([
            PhonePlanResource::make($phone_plan_updated)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function export()
    {
        $phone_plans = PhonePlan::applySortAndFilter(request('sort'), request('filter'))->get();
        $export = PhonePlanExport::collection($phone_plans);
        return response()->json(
            ['data' => $export]
        );
    }
}
