<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhysicalMilestone;
use App\Models\ProjectData;
use App\Models\work;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PhysicalMilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = ProjectData::latest()->whereNull('deleted_at')->get();
        $workname = work::latest()->whereNull('deleted_at')->get();
        // $physicalmilestone = PhysicalMilestone::latest()->whereNull('deleted_at')->get();


        $physicalmilestone = DB::table('physicalmilestone')
        ->join('project', 'project.id', '=', 'physicalmilestone.projectname') 
        ->join('work', 'work.id', '=', 'physicalmilestone.workname') 
        ->select(
            'physicalmilestone.*', 
            'project.name as ProjectName', 
            'work.name as WorkName'
        )
        ->whereNull('physicalmilestone.deleted_at')
        ->latest() 
        ->get();
        return view('admin.masters.physicalmilestones', compact('physicalmilestone', 'project','workname'));
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
    public function store(Request $request)
    {
        $request->validate([
            'projectname' => 'required',
            'workname' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        PhysicalMilestone::create([
            'projectname' => $request->projectname,
            'workname' => $request->workname,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'amount' => $request->amount, 
        ]);

        return response()->json([
            'success' => 'Physical Milestones created successfully!',
        ], 200);
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
    public function edit(string $id)
    {
        $physicalmilestones = PhysicalMilestone::find($id);
        if ($physicalmilestones) {
            return response()->json([
                'result' => 1,
                'physicalmilestones' => $physicalmilestones,
            ]);
        } else {
            return response()->json([
                'result' => 0,
                'message' => 'physicalmilestones not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'projectname' => 'required',
            'workname' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);


        try {
            $physicalmilestones = PhysicalMilestone::findOrFail($id); 
            $physicalmilestones->projectname = $request->input('projectname');
            $physicalmilestones->workname = $request->input('workname');
            $physicalmilestones->start_date = $request->input('start_date');
            $physicalmilestones->end_date = $request->input('end_date');
            $physicalmilestones->amount = $request->input('amount');
            $physicalmilestones->save();
            return response()->json([
                'success' => 'Physical Milestones  updated successfully!',
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error updating Physical Milestones: ' . $e->getMessage());

            return response()->json([
                'error' => 'An error occurred while updating the Physical Milestones.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $physicalmilestones = PhysicalMilestone::findOrFail($id);
            $physicalmilestones->delete();
            DB::commit();
            return response()->json(['success' => 'Physical Milestones deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => 'An error occurred while deleting the Physical Milestones.',
                'details' => $e->getMessage()
            ], 500); 
        }
    }
}
