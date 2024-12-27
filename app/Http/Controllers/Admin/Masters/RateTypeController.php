<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Admin\Masters\RateType\StoreRatetypeRequest;
use App\Http\Requests\Admin\Masters\RateType\UpdateRatetypeRequest;
use App\Models\Rate_Type;
use Illuminate\Http\Request;
use App\Imports\RateImport;
use Illuminate\Support\Facades\DB;
use ZipArchive;
class RateTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ratetypeList = Rate_Type::latest()->get();

        return view('admin.masters.ratetype')->with(['ratetypeList'=> $ratetypeList]);
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function import(Request $request) 
    {
        try
        {
            DB::beginTransaction();
            $request->validate([
                'importratefile' => 'required|mimes:xlsx,csv',
            ]);
      
            Excel::import(new RateImport, $request->file('importratefile'));
            DB::commit();

            return response()->json(['success'=> 'Rate imported successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Rate');
        }
        
                 
    
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRatetypeRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Rate_Type::create($input);
            DB::commit();

            return response()->json(['success'=> 'Rate created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Rate');
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
    public function edit(Rate_Type $ratetype)
    {
        if ($ratetype) {
            $response = [
                'result' => 1,
                'ratetype' => $ratetype,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRatetypeRequest $request, Rate_Type $ratetype)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $ratetype->update($input);
            DB::commit();

            return response()->json(['success'=> 'RateType updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'RateType');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rate_Type $ratetype)
    {
        try
        {
            DB::beginTransaction();
            $ratetype->delete();
            DB::commit();

            return response()->json(['success'=> 'RateType deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'RateType');
        }
    }
}
