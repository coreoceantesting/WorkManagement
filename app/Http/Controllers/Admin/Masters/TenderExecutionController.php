<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\masters\TenderExecution\StoreTenderExecutionRequest;
use App\Http\Requests\admin\masters\TenderExecution\UpdateTenderExecutionRequest;
use App\Models\TenderExecution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenderExecutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenderexecution = TenderExecution::latest()->get();

        return view('admin.masters.tenderexecution')->with(['tenderexecution'=> $tenderexecution]);
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
    public function store(StoreTenderExecutionRequest $request)
    {
        try
        {
            DB::beginTransaction();
          
            $request->validate([
                'department' => 'required',
                'projectname' => 'required',
                'resolution' => 'required',
                'resolution_date' => 'required',
                'pre_bid_meeting_date' => 'required',
                'meeting_location' => 'required',
                'issue_from_date' => 'required',
                'issue_till_date' => 'required',
                'publish_date' => 'required',
                'technical_bid_open_date' => 'required',
                'financial_bid_open_date' => 'required',
                'tender_category' => 'required',
                'validity_of_tender' => 'required|integer',
                'bank_guarantee' => 'required',
                'addition_performance_sd' => 'required',
                'provisional_sum' => 'required',
                'devaluation_percentage' => 'required',
            ]);


            if ($request->hasFile('upload_document')) {
                $file = $request->file('upload_document');
                $filePath = $file->store('tender_documents', 'public');
                $input = $request->validated();
                $input['upload_document'] = $filePath;
            }

            TenderExecution::create($input);
            DB::commit();

            return response()->json(['success' => 'Tender Execution and Award created successfully!']);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => 'An error occurred while creating the Tender Execution.',
                'details' => $e->getMessage()
            ], 500); 
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
    public function edit(TenderExecution $tenderexecution)
    {
        if ($tenderexecution)
        {
            $response = [
                'result' => 1,
                'tenderexecution' => $tenderexecution,
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
    public function update(UpdateTenderExecutionRequest $request, TenderExecution $tenderexecution)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $tenderexecution->update($input);
            DB::commit();

            return response()->json(['success'=> 'Tender Execution and Award updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'TenderExecution');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TenderExecution $tenderexecution)
    {
        try
        {
            DB::beginTransaction();
            $tenderexecution->delete();
            DB::commit();

            return response()->json(['success'=> 'TenderExecution deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'TenderExecution');
        }
    }
}
