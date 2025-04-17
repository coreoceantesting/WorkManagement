<?php

namespace App\Http\Controllers\Admin\Masters;
use App\Models\WorkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\WorkType\StoreWorkTypeRequest;
use App\Http\Requests\Admin\Masters\WorkType\UpdateWorkTypeRequest;
use App\Http\Requests\Admin\Masters\Departments\UpdateDepartmentRequest;

class WorkTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:masters.all');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work_types = WorkType::latest()->get();

        return view('admin.masters.work_types')->with(['work_types'=> $work_types]);
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
    public function store(StoreWorkTypeRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            WorkType::create($input);
            DB::commit();

            return response()->json(['success'=> 'Work Type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Work Type');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkType $workType)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkType $workType)
    {

        if ($workType)
        {
            $response = [
                'result' => 1,
                'work_type' => $workType,
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
    public function update(UpdateWorkTypeRequest $request, WorkType $workType)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $workType->update($input);
            DB::commit();
            return response()->json(['success'=> 'Work Type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Work Type');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkType $workType)
    {
        //
    }
}
