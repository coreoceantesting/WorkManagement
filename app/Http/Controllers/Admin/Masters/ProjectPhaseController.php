<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Models\ProjectPhase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\ProjectPhase\StoreProjectPhaseRequest;
use App\Http\Requests\Admin\Masters\ProjectPhase\UpdateProjectPhaseRequest;

class ProjectPhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project_phases = ProjectPhase::latest()->get();

        return view('admin.masters.project_phases')->with(['project_phases'=> $project_phases]);
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
    public function store(StoreProjectPhaseRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            ProjectPhase::create($input);
            DB::commit();

            return response()->json(['success'=> 'Project Phase created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Project Phase');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectPhase $projectPhase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectPhase $projectPhase)
    {
        if ($projectPhase)
        {
            $response = [
                'result' => 1,
                'project_phase' => $projectPhase,
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
    public function update(UpdateProjectPhaseRequest $request, ProjectPhase $projectPhase)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $projectPhase->update($input);
            DB::commit();
            return response()->json(['success'=> 'Project Phase updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Project Phase');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectPhase $projectPhase)
    {
        //
    }
}
