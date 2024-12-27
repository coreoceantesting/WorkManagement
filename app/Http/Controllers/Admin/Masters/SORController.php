<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SOR;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Masters\SOR\StoreSORRequest;
use App\Http\Requests\Admin\Masters\SOR\UpdateSORRequest;

class SORController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sorList = SOR::latest()->get();

        return view('admin.masters.SOR')->with(['sorList'=> $sorList]);
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
    public function store(StoreSORRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            SOR::create($input);
            DB::commit();

            return response()->json(['success'=> 'SOR bcreated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'SOR');
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
    public function edit(sor $sor)
    {
        if ($sor) {
            $response = [
                'result' => 1,
                'sor' => $sor,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSORRequest $request, sor $sor)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $sor->update($input);
            DB::commit();

            return response()->json(['success'=> 'SOR updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'SOR');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sor $sor)
    {
        try
        {
            DB::beginTransaction();
            $sor->delete();
            DB::commit();

            return response()->json(['success'=> 'SOR deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'SOR');
        }
    }
}
