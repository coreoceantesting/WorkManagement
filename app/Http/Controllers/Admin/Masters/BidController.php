<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\masters\Bid\StoreBidRequest;
use App\Http\Requests\admin\masters\Bid\UpdateBidRequest;
use App\Models\Bid;
use App\Models\Projectinfo;
use App\Models\Tenderentry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $BidList = Bid::with('projectinfoData','tenderData')->latest()->get();
        $data['projectinfo'] = Projectinfo::latest()->get();
        $data['tenderentry'] = Tenderentry::latest()->get();  
      
        return view('admin.masters.bid',compact('BidList'), $data);
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
    public function store(StoreBidRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            // dd($input);
            Bid::create($input);
            DB::commit();

            return response()->json(['success'=> 'BID Entry created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Bid');
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
    public function edit(Bid $bid)
    {
        if ($bid) {
            $response = [
                'result' => 1,
                'bid' => $bid,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBidRequest $request, Bid $Bid)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $Bid->update($input);
            DB::commit();

            return response()->json(['success'=> 'BID Entry updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Bid');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bid $Bid)
    {
        try
        {
            DB::beginTransaction();
            $Bid->delete();
            DB::commit();

            return response()->json(['success'=> 'BID Entry deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Bid');
        }
    }
}
