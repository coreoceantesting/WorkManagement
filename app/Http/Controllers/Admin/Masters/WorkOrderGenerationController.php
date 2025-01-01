<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\WorkOrder;
use App\Models\Department;


class WorkOrderGenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workList = WorkOrder::latest()->whereNull('deleted_at')->get();
        $departments = Department::latest()->whereNull('deleted_at')->get();

        return view('admin.masters.workorder', compact('workList', 'departments'));
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
        
        $validator = Validator::make($request->all(), [
            'department' => 'required',
            'work_order_no' => 'required',
            'work_order_date' => 'required',
            'agreement_no' => 'required',
            'contractor_name' => 'required|string',
            'work_name' => 'required',
            'contract_value' => 'required',
            'stipulated_completion_period' => 'required',
            'system_tender_no' => 'required',
            'system_tender_date' => 'required',
            'date_of_commitment' => 'required',
            'work_assignee' => 'required',
            'document_description' => 'required',
            'document_upload' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        
        if ($validator->fails()) {
            return response()->json([
                'error2' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        
        $documentPath = null;
        if ($request->hasFile('document_upload')) {
            $document = $request->file('document_upload');
            $documentPath = $document->store('work_orders', 'public');
        }

      
        $workOrder = new WorkOrder();
        $workOrder->department = $request->input('department');
        $workOrder->work_order_no = $request->input('work_order_no');
        $workOrder->work_order_date = $request->input('work_order_date');
        $workOrder->agreement_no = $request->input('agreement_no');
        $workOrder->contractor_name = $request->input('contractor_name');
        $workOrder->work_name = $request->input('work_name');
        $workOrder->contract_value = $request->input('contract_value');
        $workOrder->stipulated_completion_period = $request->input('stipulated_completion_period');
        $workOrder->system_tender_no = $request->input('system_tender_no');
        $workOrder->system_tender_date = $request->input('system_tender_date');
        $workOrder->date_of_commitment = $request->input('date_of_commitment');
        $workOrder->work_assignee = $request->input('work_assignee');
        $workOrder->document_description = $request->input('document_description');
        $workOrder->document_upload = $documentPath; 
        $workOrder->save();

     
        return response()->json([
            'success' => 'Work order created successfully!',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkOrder $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $workOrder = WorkOrder::find($id);
        if ($workOrder) {
            return response()->json([
                'result' => 1,
                'workOrder' => $workOrder,
            ]);
        } else {
            return response()->json([
                'result' => 0,
                'message' => 'Work order not found'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
      
        $validator = Validator::make($request->all(), [
            'department' => 'required',
            'work_order_no' => 'required',
            'work_order_date' => 'required',
            'agreement_no' => 'required|string',
            'contractor_name' => 'required|string',
            'work_name' => 'required',
            'contract_value' => 'required',
            'stipulated_completion_period' => 'required',
            'system_tender_no' => 'required',
            'system_tender_date' => 'required',
            'date_of_commitment' => 'required',
            'work_assignee' => 'required',
            'document_description' => 'required',
            'document_upload' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error2' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $workOrder = WorkOrder::findOrFail($id); 
            $workOrder->department = $request->input('department');
            $workOrder->work_order_no = $request->input('work_order_no');
            $workOrder->work_order_date = $request->input('work_order_date');
            $workOrder->agreement_no = $request->input('agreement_no');
            $workOrder->contractor_name = $request->input('contractor_name');
            $workOrder->work_name = $request->input('work_name');
            $workOrder->contract_value = $request->input('contract_value');
            $workOrder->stipulated_completion_period = $request->input('stipulated_completion_period');
            $workOrder->system_tender_no = $request->input('system_tender_no');
            $workOrder->system_tender_date = $request->input('system_tender_date');
            $workOrder->date_of_commitment = $request->input('date_of_commitment');
            $workOrder->work_assignee = $request->input('work_assignee');
            $workOrder->document_description = $request->input('document_description');
            if ($request->hasFile('document_upload')) {
                if ($workOrder->document_upload) {
                    Storage::disk('public')->delete($workOrder->document_upload);
                }
                $document = $request->file('document_upload');
                $documentPath = $document->store('work_orders', 'public');
                $workOrder->document_upload = $documentPath;
            }
            $workOrder->save();
            return response()->json([
                'success' => 'Work order updated successfully!',
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error updating work order: ' . $e->getMessage());

            return response()->json([
                'error' => 'An error occurred while updating the work order.',
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
            $work = WorkOrder::findOrFail($id);
            $work->delete();
            DB::commit();
            return response()->json(['success' => 'Work Order deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => 'An error occurred while deleting the work order.',
                'details' => $e->getMessage()
            ], 500); 
        }
    }

}
