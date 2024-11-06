<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\ContractTypes\StoreContractTypesRequest;
use App\Http\Requests\Admin\Masters\ContractTypes\UpdateContractTypesRequest;
use App\Models\ContractType;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ContractTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contractTypesList = ContractType::latest()->get();

        return view('admin.masters.contractTypes')->with(['contractTypesList'=> $contractTypesList]);
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
    public function store(StoreContractTypesRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            ContractType::create($input);
            DB::commit();

            return response()->json(['success'=> 'Contract Type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Contract Type');
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
    public function edit(ContractType $contractType)
    {
        if ($contractType) {
            $response = [
                'result' => 1,
                'contractType' => $contractType,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractTypesRequest $request, ContractType $contractType)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $contractType->update($input);
            DB::commit();

            return response()->json(['success'=> 'Contract type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'contract Type');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContractType $contractType)
    {
        try
        {
            DB::beginTransaction();
            $contractType->delete();
            DB::commit();

            return response()->json(['success'=> 'Contract type deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Contract Type');
        }
    }
}
