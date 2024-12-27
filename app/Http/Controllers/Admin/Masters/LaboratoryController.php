<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\masters\Laboratory\StoreLaboratoryRequest;
use App\Http\Requests\admin\masters\Laboratory\UpdateLaboratoryRequest;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratory = Laboratory::latest()->get();

        return view('admin.masters.laboratory')->with(['laboratory'=> $laboratory]);
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
    public function store(StoreLaboratoryRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Laboratory::create($input);
            DB::commit();

            return response()->json(['success'=> 'Laboratory created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Laboratory');
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
    public function edit(Laboratory $laboratory)
    {
        if ($laboratory)
        {
            $response = [
                'result' => 1,
                'laboratory' => $laboratory,
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
    public function update(UpdateLaboratoryRequest $request, Laboratory $laboratory)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $laboratory->update($input);
            DB::commit();

            return response()->json(['success'=> 'Laboratory updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Laboratory');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratory $laboratory)
    {
        try
        {
            DB::beginTransaction();
            $laboratory->delete();
            DB::commit();

            return response()->json(['success'=> 'Laboratory deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Laboratory');
        }
    }
}
