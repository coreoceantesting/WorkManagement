<?php

namespace App\Http\Controllers\Admin\Masters\Fund;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\masters\fund\StoreMajorFundRequest;
use App\Http\Requests\admin\masters\fund\UpdateMajorFundRequest;
use App\Models\MajorFund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MajorFundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majorfundList = MajorFund::latest()->get();

        return view('admin.masters.fund.majorfund')->with(['majorfundList'=> $majorfundList]);
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
    public function store(StoreMajorFundRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
    
            // Get the latest Major Fund Code based on the highest major fund code
            $lastMajorFund = MajorFund::orderBy('major_fund_code', 'desc')->count();
            

            // Ensure the Major Fund Code is always two digits (e.g., 01, 02, 03...)
            $newMajorFundCode = str_pad($lastMajorFund + 1, 2, '0', STR_PAD_LEFT);
            
    
            // Add the generated major fund code to the input
            $input['major_fund_code'] = $newMajorFundCode;
            // dd($input);
            // Create the Major Fund entry
            MajorFund::create($input);
    
            // Commit the transaction
            DB::commit();

            return response()->json(['success'=> 'Major Fund created successfully!']);

        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'MajorFund');
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
    public function edit(MajorFund $majorfund)
    {
        if ($majorfund) {
            $response = [
                'result' => 1,
                'majorfund' => $majorfund,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMajorFundRequest $request, MajorFund $majorfund)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $majorfund->update($input);
            DB::commit();

            return response()->json(['success'=> 'Major Fund updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'MajorFund');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MajorFund $majorfund)
    {
        try
        {
            DB::beginTransaction();
            $majorfund->delete();
            DB::commit();

            return response()->json(['success'=> 'Major Fund deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'MajorFund');
        }
    }
}
