<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\Schemes\StoreSchemeRequest;
use App\Http\Requests\Admin\Masters\Schemes\UpdateSchemeRequest;
use App\Models\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SchemesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schemesList = Scheme::latest()->get();

        return view('admin.masters.schemes')->with(['schemesList'=> $schemesList]);
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
    public function store(StoreSchemeRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Scheme::create($input);
            DB::commit();

            return response()->json(['success'=> 'Scheme created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Scheme');
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
    public function edit(Scheme $scheme)
    {
        if ($scheme)
        {
            $response = [
                'result' => 1,
                'scheme' => $scheme,
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
    public function update(UpdateSchemeRequest $request, Scheme $scheme)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $scheme->update($input);
            DB::commit();

            return response()->json(['success'=> 'Scheme updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Scheme');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scheme $scheme)
    {
        try
        {
            DB::beginTransaction();
            $scheme->delete();
            DB::commit();

            return response()->json(['success'=> 'Scheme deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Scheme');
        }
    }
}
