<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Contract;
use App\Http\Requests\Catalog\ContractRequest;
use App\Http\Resources\Catalog\ContractResource;
use App\Http\Resources\Catalog\ContractExport;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::applySortAndFilter(request('sort'), request('filter'))->paginate(request('perPage'));
        return ContractResource::collection($contracts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContractRequest $request)
    {
        $contract = Contract::create($request->validated());
        return response()->json([
            ContractResource::make($contract)
        ], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contract = Contract::findOrFail($id);
        return response()->json([
            'data' =>  ContractResource::make($contract)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContractRequest $request, Contract $contract)
    {
        Contract::where('id', $contract->id)->update($request->validated());
        $contract_updated = Contract::findOrFail($contract->id);
        return response()->json([
            ContractResource::make($contract_updated)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function export()
    {
        $contracts = Contract::applySortAndFilter(request('sort'), request('filter'))->get();
        $export = ContractExport::collection($contracts);
        return response()->json(
            ['data' => $export]
        );
    }
}
