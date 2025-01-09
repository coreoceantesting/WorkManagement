<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeasurementBook;
use App\Models\WorkOrder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MeasurementBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $measuremntbook = MeasurementBook::latest()->whereNull('deleted_at')->get();
        $workorder = WorkOrder::latest()->whereNull('deleted_at')->get();

        $measuremntbook = DB::table('measurementbook')
        ->join('work_orders', 'work_orders.id', '=', 'measurementbook.work_order_number') 
        ->select(
            'measurementbook.*', 
            'work_orders.work_order_no as Name'
        )
        ->whereNull('measurementbook.deleted_at')
        ->latest() 
        ->get();
        return view('admin.masters.measurementbooks', compact('measuremntbook','workorder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function workorder_data(Request $request)
    {
        $work_order = WorkOrder::find($request->work_order_id);

        if ($work_order) {
            return response()->json([
                'agreement_no' => $work_order->agreement_no,
                'work_order_date' => $work_order->work_order_date,
            ]);
        }

        return response()->json(['error' => 'Work Order not found.'], 404);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'workorderno' => 'required', 
            'work_order_account' => 'required',
            'work_order_date' => 'required',
            'agreement_form_date' => 'required',
            'agreement_to_date' => 'required',
            'agreement_no' => 'required',
            'measurement_date' => 'required',
            'ledger_no' => 'required',
            'description' => 'required',
            'pages_no' => 'required',
            'engineer_name' => 'required',
        ]);

        $measurementBook = new MeasurementBook();
        $measurementBook->work_order_number = $request->workorderno;
        $measurementBook->work_order_account = $request->work_order_account;
        $measurementBook->work_order_date = $request->work_order_date;
        $measurementBook->agreement_form_date = $request->agreement_form_date;
        $measurementBook->agreement_to_date = $request->agreement_to_date;
        $measurementBook->agreement_no = $request->agreement_no;
        $measurementBook->measurement_date = $request->measurement_date;
        $measurementBook->ledger_no = $request->ledger_no;
        $measurementBook->description = $request->description;
        $measurementBook->pages_no = $request->pages_no;
        $measurementBook->engineer_name = $request->engineer_name;
        $measurementBook->created_by = auth()->id();
        $measurementBook->updated_by = auth()->id(); 
        $measurementBook->save();


        return response()->json([
            'success' => 'Measurement Book added successfully',
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
        $measurementbooks = MeasurementBook::find($id);
        if ($measurementbooks) {
            return response()->json([
                'result' => 1,
                'measurementbooks' => $measurementbooks,
            ]);
        } else {
            return response()->json([
                'result' => 0,
                'message' => 'measurementbooks not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'workorderno' => 'required', 
            'work_order_account' => 'required',
            'work_order_date' => 'required',
            'agreement_form_date' => 'required',
            'agreement_to_date' => 'required',
            'agreement_no' => 'required',
            'measurement_date' => 'required',
            'ledger_no' => 'required',
            'description' => 'required',
            'pages_no' => 'required',
            'engineer_name' => 'required',
        ]);
    
        $measurementBook = MeasurementBook::find($id);
    
        if (!$measurementBook) {
            return response()->json([
                'error' => 'Measurement Book not found.',
            ], 404);
        }
    
        $measurementBook->work_order_number = $request->workorderno;
        $measurementBook->work_order_account = $request->work_order_account;
        $measurementBook->work_order_date = $request->work_order_date;
        $measurementBook->agreement_form_date = $request->agreement_form_date;
        $measurementBook->agreement_to_date = $request->agreement_to_date;
        $measurementBook->agreement_no = $request->agreement_no;
        $measurementBook->measurement_date = $request->measurement_date;
        $measurementBook->ledger_no = $request->ledger_no;
        $measurementBook->description = $request->description;
        $measurementBook->pages_no = $request->pages_no;
        $measurementBook->engineer_name = $request->engineer_name;
        $measurementBook->updated_by = auth()->id(); 
    
        $measurementBook->save();
    
        return response()->json([
            'success' => 'Measurement Book updated successfully',
        ], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $measurementBook = MeasurementBook::findOrFail($id);
            $measurementBook->delete();
            DB::commit();
            return response()->json(['success' => 'Measurement Book deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => 'An error occurred while deleting the Measurement Book.',
                'details' => $e->getMessage()
            ], 500); 
        }
    }
}
