<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tender;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tender = Tender::latest()->whereNull('deleted_at')->get();

        return view('admin.masters.tender')->with(['tender'=> $tender]);
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
            'project_name' => 'required|string|max:255',
            'resolution' => 'required|string',
            'resolution_date' => 'required|date',
            'pre_bid_meeting_date' => 'required|date',
            'meeting_location' => 'required|string|max:255',
            'issue_from_date' => 'required|date',
            'issue_till_date' => 'required|date',
            'publish_date' => 'required|date',
            'technical_bid_open_date' => 'required|date',
            'financial_bid_open_date' => 'required|date',
            'validity_of_tender_in_days' => 'required|integer',
            'bank_guarantee' => 'required|numeric',
            'additional_performance_sd' => 'required|numeric',
            'provisional_sum' => 'required|numeric',
            'deviation_percentage' => 'required|numeric',
            'upload_document' => 'nullable|file|mimes:pdf,docx,jpg,png|max:10240',
        ]);
        
        $uploadDocumentPath = null;
        if ($request->hasFile('upload_document')) {
            $uploadDocument = $request->file('upload_document');
            $uploadDocumentPath = $uploadDocument->store('tender', 'public'); 
        }
        
        Tender::create([
            'department' => $request->department, 
            'project_name' => $request->project_name,
            'resolution' => $request->resolution,
            'resolution_date' => $request->resolution_date,
            'pre_bid_meeting_date' => $request->pre_bid_meeting_date,
            'meeting_location' => $request->meeting_location,
            'issue_from_date' => $request->issue_from_date,
            'issue_till_date' => $request->issue_till_date,
            'publish_date' => $request->publish_date,
            'technical_bid_open_date' => $request->technical_bid_open_date,
            'financial_bid_open_date' => $request->financial_bid_open_date,
            'validity_of_tender_in_days' => $request->validity_of_tender_in_days,
            'bank_guarantee' => $request->bank_guarantee,
            'additional_performance_sd' => $request->additional_performance_sd,
            'provisional_sum' => $request->provisional_sum,
            'deviation_percentage' => $request->deviation_percentage,
            'upload_document' => $uploadDocumentPath,
        ]);
        
        return response()->json([
            'success' => 'Tender created successfully!',
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
        $tender = Tender::find($id);
        if ($tender) {
            return response()->json([
                'result' => 1,
                'tender' => $tender,
            ]);
        } else {
            return response()->json([
                'result' => 0,
                'message' => 'Tender order not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'resolution' => 'required|string',
            'resolution_date' => 'required|date',
            'pre_bid_meeting_date' => 'required|date',
            'meeting_location' => 'required|string|max:255',
            'issue_from_date' => 'required|date',
            'issue_till_date' => 'required|date',
            'publish_date' => 'required|date',
            'technical_bid_open_date' => 'required|date',
            'financial_bid_open_date' => 'required|date',
            'validity_of_tender_in_days' => 'required|integer',
            'bank_guarantee' => 'required|numeric',
            'additional_performance_sd' => 'required|numeric',
            'provisional_sum' => 'required|numeric',
            'deviation_percentage' => 'required|numeric',
            'upload_document' => 'nullable|file|mimes:pdf,docx,jpg,png|max:10240',  
        ]);

        $tender = Tender::findOrFail($id);
        
        $uploadDocument = $request->file('upload_document');
        $uploadDocumentPath = $tender->upload_document;  
        
        if ($uploadDocument) {
            if ($uploadDocumentPath) {
                Storage::delete($uploadDocumentPath);
            }

            $uploadDocumentPath = $uploadDocument->store('documents');
        }

        $tender->update([
            'project_name' => $request->project_name,
            'resolution' => $request->resolution,
            'resolution_date' => $request->resolution_date,
            'pre_bid_meeting_date' => $request->pre_bid_meeting_date,
            'meeting_location' => $request->meeting_location,
            'issue_from_date' => $request->issue_from_date,
            'issue_till_date' => $request->issue_till_date,
            'publish_date' => $request->publish_date,
            'technical_bid_open_date' => $request->technical_bid_open_date,
            'financial_bid_open_date' => $request->financial_bid_open_date,
            'validity_of_tender_in_days' => $request->validity_of_tender_in_days,
            'bank_guarantee' => $request->bank_guarantee,
            'additional_performance_sd' => $request->additional_performance_sd,
            'provisional_sum' => $request->provisional_sum,
            'deviation_percentage' => $request->deviation_percentage,
            'upload_document' => $uploadDocumentPath, 
        ]);

        return response()->json([
            'success' => 'Tender updated successfully!',
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tender = Tender::findOrFail($id);
        if ($tender->upload_document) {
            Storage::delete($tender->upload_document);
        }

        $tender->delete();
        return response()->json([
            'success' => 'Tender Delete successfully!',
        ], 200);
    }
}
