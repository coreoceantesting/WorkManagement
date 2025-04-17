<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\ContractorTypes\StoreContractorTypesRequest;
use App\Http\Requests\Admin\Masters\ContractorTypes\UpdateContractorTypesRequest;
use App\Models\ContractorType;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ContractorTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:masters.all');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contractorsTypesList = ContractorType::latest()->get();

        return view('admin.masters.contractor_types')->with(['contractorsTypesList'=> $contractorsTypesList]);
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
    public function store(StoreContractorTypesRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            ContractorType::create($input);
            DB::commit();

            return response()->json(['success'=> 'Contractor Type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'contractor Type');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContractorType $contractorType)
    {
        if ($contractorType) {
            $response = [
                'result' => 1,
                'contractorType' => $contractorType,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractorTypesRequest $request, ContractorType $contractorType)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $contractorType->update($input);
            DB::commit();

            return response()->json(['success'=> 'Contractor type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'contractor Type');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContractorType $contractorType)
    {
        try
        {
            DB::beginTransaction();
            $contractorType->delete();
            DB::commit();

            return response()->json(['success'=> 'Contractor type deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Contractor Type');
        }
    }


    public function subContractorType(ContractorType $contractorType)
    {
        $response = [
            'result' => 1,
            'contractorSubTypes' => $contractorType->contractor_sub_types??[],
        ];

        return $response;
    }
}
