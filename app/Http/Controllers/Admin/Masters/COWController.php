<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\COW;
use App\Http\Requests\admin\masters\COW\StoreCOWRequest;
use App\Http\Requests\admin\masters\COW\UpdateCOWRequest;
use Illuminate\Support\Facades\DB;

class COWController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cowList = COW::latest()->get();

        return view('admin.masters.COW')->with(['cowList'=> $cowList]);
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
    public function store(StoreCOWRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            COW::create($input);
            DB::commit();

            return response()->json(['success'=> 'Category of Work created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'COW');
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
    public function edit(cow $cow)
    {
        if ($cow) {
            $response = [
                'result' => 1,
                'cow' => $cow,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateCOWRequest $request, cow $cow)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $cow->update($input);
            DB::commit();

            return response()->json(['success'=> 'Category of Work updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'COW');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cow $cow)
    {
        try
        {
            DB::beginTransaction();
            $cow->delete();
            DB::commit();

            return response()->json(['success'=> 'Category of Work deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'COW');
        }
    }
}
