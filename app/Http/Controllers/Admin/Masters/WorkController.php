<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\Work\StoreworkRequest;
use App\Http\Requests\Admin\Masters\Work\UpdateworkRequest;
use App\Models\work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workList = work::latest()->get();

        return view('admin.masters.work')->with(['workList'=> $workList]);
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
    public function store(StoreworkRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            work::create($input);
            DB::commit();

            return response()->json(['success'=> 'Work created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Work');
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
    public function edit(work $work)
    {
        if ($work) {
            $response = [
                'result' => 1,
                'work' => $work,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateworkRequest $request, work $work)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $work->update($input);
            DB::commit();

            return response()->json(['success'=> 'Work updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Work');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(work $work)
    {
        try
        {
            DB::beginTransaction();
            $work->delete();
            DB::commit();

            return response()->json(['success'=> 'Work deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Work');
        }
    }
}
