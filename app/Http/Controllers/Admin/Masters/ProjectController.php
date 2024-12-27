<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\Project\StoreprojectRequest;
use App\Http\Requests\Admin\Masters\Project\UpdateprojectRequest;
use App\Models\project;
use App\Models\ProjectData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectList = ProjectData::latest()->get();

        return view('admin.masters.project')->with(['projectList'=> $projectList]);
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
    public function store(StoreprojectRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            ProjectData::create($input);
            DB::commit();

            return response()->json(['success'=> 'Project created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Project');
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
    public function edit(ProjectData $project)
    {
        if ($project) {
            $response = [
                'result' => 1,
                'project' => $project,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprojectRequest $request,ProjectData $project)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $project->update($input);
            DB::commit();

            return response()->json(['success'=> 'Project updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'project');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectData $project)
    {
        try
        {
            DB::beginTransaction();
            $project->delete();
            DB::commit();

            return response()->json(['success'=> 'Project deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Project');
        }
    }
}
