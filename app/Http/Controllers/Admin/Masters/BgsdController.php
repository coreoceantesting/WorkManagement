<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\masters\BGSD\StoreBgsdRequest;
use App\Http\Requests\admin\masters\BGSD\UpdateBgsdRequest;
use App\Models\BGSD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BgsdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $BgsdList = BGSD::latest()->get();

        return view('admin.masters.bgsd')->with(['BgsdList'=> $BgsdList]);
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
    public function store(StoreBgsdRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            // dd($input);
            BGSD::create($input);
            DB::commit();

            return response()->json(['success'=> 'Bank Gaurantee/Security Deposite created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'BGSD');
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
    public function edit(BGSD $Bgsd)
    {
        if ($Bgsd) {
            $response = [
                'result' => 1,
                'Bgsd' => $Bgsd,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBgsdRequest $request, BGSD $Bgsd)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $Bgsd->update($input);
            DB::commit();

            return response()->json(['success'=> 'Bank Gaurantee/Security Deposite updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'BGSD');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BGSD $Bgsd)
    {
        try
        {
            DB::beginTransaction();
            $Bgsd->delete();
            DB::commit();

            return response()->json(['success'=> 'Bank Gaurantee/Security Deposite deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'BGSD');
        }
    }
}
