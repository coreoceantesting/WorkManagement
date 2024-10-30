<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\SourceOfFund\StoreSourceOfFundRequest;
use App\Http\Requests\Admin\Masters\SourceOfFund\UpdateSourceOfFundRequest;
use App\Models\SourceOfFund;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SourceOfFundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fundList = SourceOfFund::latest()->get();

        return view('admin.masters.sourceOfFund')->with(['fundList'=> $fundList]);
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
    public function store(StoreSourceOfFundRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            SourceOfFund::create($input);
            DB::commit();

            return response()->json(['success'=> 'Source Of Fund created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'source of fund');
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
    public function edit(SourceOfFund $sourceOfFund)
    {
        if ($sourceOfFund)
        {
            $response = [
                'result' => 1,
                'sourceOfFund' => $sourceOfFund,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSourceOfFundRequest $request, SourceOfFund $sourceOfFund)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $sourceOfFund->update($input);
            DB::commit();

            return response()->json(['success'=> 'Source Of Fund updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Source Of Fund');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SourceOfFund $sourceOfFund)
    {
        try
        {
            DB::beginTransaction();
            $sourceOfFund->delete();
            DB::commit();

            return response()->json(['success'=> 'Source of fund deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Source of fund');
        }
    }
}
