<?php

namespace App\Http\Controllers\Admin\Masters\Fund;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\admin\masters\fund\StoreMinorFundRequest;
use App\Http\Requests\admin\masters\fund\UpdateMinorFundRequest;
use App\Models\MajorFund;
use App\Models\MinorFund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinorFundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $minorfundList = MinorFund::with('majorfund')->latest()->get();
        $majorfund = MajorFund::all();
        return view('admin.masters.fund.minorfund')->with(['minorfundList'=> $minorfundList,'majorfund'=>$majorfund]);
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
    public function store(StoreMinorFundRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            // dd($input);
    
            // Get the latest Major Fund Code based on the highest major fund code
            $lastMinorFund = MinorFund::where('major_fund_code',$input['major_fund_code'])->orderBy('minor_fund_code', 'desc')->count();
            

            // Ensure the Major Fund Code is always two digits (e.g., 01, 02, 03...)
            $newMinorFundCode = str_pad($lastMinorFund + 1, 2, '0', STR_PAD_LEFT);
            
    
            // Add the generated major fund code to the input
            $input['minor_fund_code'] =$input['major_fund_code'].$newMinorFundCode;
            // dd($input);
            // Create the Major Fund entry
            MinorFund::create($input);
            DB::commit();

            return response()->json(['success'=> 'Minor Fund created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'MinorFund');
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
    public function edit(MinorFund $minorfund)
    {
        $majorfund = MajorFund::all();
        if ($minorfund) {
            $mastersHtml = '<span>
            <option value="">--Select--</option>';
            foreach ($majorfund as $majorfund):
                $is_select = $majorfund->id == $minorfund->major_fund_code ? "selected" : "";
                $mastersHtml .= '<option value="' . $majorfund->id . '" ' . $is_select . '>' . $majorfund->major_fund_code.'</option>';
            endforeach;
            $mastersHtml .= '</span>';

            $response = [
                'result' => 1,
                'minorfund' => $minorfund,
                'mastersHtml' => $mastersHtml, 
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMinorFundRequest $request, MinorFund $minorfund)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $minorfund->update($input);
            DB::commit();

            return response()->json(['success'=> 'Minor Fund updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'MinorFund');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MinorFund $minorfund)
    {
        try
        {
            DB::beginTransaction();
            $minorfund->delete();
            DB::commit();

            return response()->json(['success'=> 'Minor Fund deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'MinorFund');
        }
    }
}
