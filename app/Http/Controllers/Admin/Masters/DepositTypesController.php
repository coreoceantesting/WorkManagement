<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\DepositTypes\StoreDepositTypesRequest;
use App\Http\Requests\Admin\Masters\DepositTypes\UpdateDepositTypesRequest;
use App\Models\DepositType;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DepositTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depositTypesList = DepositType::latest()->get();

        return view('admin.masters.depositTypes')->with(['depositTypesList'=> $depositTypesList]);
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
    public function store(StoreDepositTypesRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DepositType::create($input);
            DB::commit();

            return response()->json(['success'=> 'Deposit Type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Deposit Type');
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
    public function edit(DepositType $depositType)
    {
        if ($depositType) {
            $response = [
                'result' => 1,
                'depositType' => $depositType,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepositTypesRequest $request, DepositType $depositType)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $depositType->update($input);
            DB::commit();

            return response()->json(['success'=> 'Deposit type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Deposit Type');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DepositType $depositType)
    {
        try
        {
            DB::beginTransaction();
            $depositType->delete();
            DB::commit();

            return response()->json(['success'=> 'Deposit type deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Deposit Type');
        }
    }
}
