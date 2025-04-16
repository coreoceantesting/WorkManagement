<?php

namespace App\Http\Controllers\Admin\Masters;

use Illuminate\Http\Request;
use App\Models\ContractorType;
use App\Models\ContractorSubType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\ContractorSubTypes\StoreContractorSubTypesRequest;
use App\Http\Requests\Admin\Masters\ContractorSubTypes\UpdateContractorSubTypesRequest;

class ContractorSubTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contractorSubTypeList = ContractorSubType::with('contractor_type')->latest()->get();
        $contractorType = ContractorType::latest()->get();
        return view('admin.masters.contractor_sub_types')->with([
            'contractor_sub_type_list'=> $contractorSubTypeList,
            'contractor_type'=>$contractorType
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractorSubTypesRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            ContractorSubType::create($input);
            DB::commit();

            return response()->json(['success'=> 'Contractor Sub Type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Contractor Sub Type');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ContractorSubType $contractorSubType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContractorSubType $contractorSubType)
    {
        if ($contractorSubType) {
            $response = [
                'result' => 1,
                'contractorSubType' => $contractorSubType,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractorSubTypesRequest $request, ContractorSubType $contractorSubType)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $contractorSubType->update($input);
            DB::commit();

            return response()->json(['success'=> 'Contractor sub type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Contractor Sub Type');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContractorSubType $contractorSubType)
    {
        //
    }
}
