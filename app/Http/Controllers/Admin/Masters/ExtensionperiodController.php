<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Extensionperiod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExtensionperiodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extensionperiod = Extensionperiod::latest()->whereNull('deleted_at')->get();

        return view('admin.masters.extensionperiod')->with(['extensionperiod'=> $extensionperiod]);
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
            'agreement_no' => 'required|string',
            'contractor_name' => 'required|string|max:255',
            'agreement_from_date' => 'required|date',
            'agreement_to_date' => 'required|date',
            'extension_period' => 'required|in:days,hours,months,years', 
            'extension_value' => 'required|numeric',
            'document_description' => 'required|string|max:255',
            'upload_document' => 'required|file|mimes:pdf,docx,doc,png,jpg,jpeg|max:10240',
        ]);

        $extensionPeriod = $request->extension_period;
        if (!in_array($extensionPeriod, ['days', 'hours', 'months', 'years'])) {
            return back()->withErrors(['extension_period' => 'Invalid extension period value']);
        }

        $documentPath = null;
        if ($request->hasFile('upload_document')) {
            $documentPath = $request->file('upload_document')->store('extension_documents', 'public');
        }

        ExtensionPeriod::create([
            'agreement_no' => $request->agreement_no,
            'contractor_name' => $request->contractor_name,
            'agreement_from_date' => $request->agreement_from_date,
            'agreement_to_date' => $request->agreement_to_date,
            'extension_period' => $extensionPeriod,
            'extension_value' => $request->extension_value, 
            'document_description' => $request->document_description,
            'upload_document' => $documentPath, 
        ]);

        return response()->json([
            'success' => 'Extension Period created successfully!',
        ], 200);
    }

     

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $extensionperiod = Extensionperiod::find($id);
        if ($extensionperiod) {
            return response()->json([
                'result' => 1,
                'extensionperiod' => $extensionperiod,
            ]);
        } else {
            return response()->json([
                'result' => 0,
                'message' => 'Extension Period  not found'
            ], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'agreement_no' => 'required|string',
            'contractor_name' => 'required|string|max:255',
            'agreement_from_date' => 'required|date',
            'agreement_to_date' => 'required|date',
            'extension_period' => 'required|in:days,hours,months,years', 
            // 'extension_value' => 'required|numeric',
            'document_description' => 'required|string|max:255',
            'upload_document' => 'nullable|file|mimes:pdf,docx,doc,png,jpg,jpeg',
        ]);

        $extensionPeriod = ExtensionPeriod::find($id);

        if (!$extensionPeriod) {
            return response()->json(['error' => 'Extension Period not found'], 404);
        }

        $extensionPeriod->agreement_no = $request->agreement_no;
        $extensionPeriod->contractor_name = $request->contractor_name;
        $extensionPeriod->agreement_from_date = $request->agreement_from_date;
        $extensionPeriod->agreement_to_date = $request->agreement_to_date;
        $extensionPeriod->extension_period = $request->extension_period;
        // $extensionPeriod->extension_value = $request->extension_value;
        $extensionPeriod->document_description = $request->document_description;

        if ($request->hasFile('upload_document')) {
            if ($extensionPeriod->upload_document) {
                Storage::disk('public')->delete($extensionPeriod->upload_document);
            }
            $documentPath = $request->file('upload_document')->store('extension_documents', 'public');
            $extensionPeriod->upload_document = $documentPath;
        }

        $extensionPeriod->save();
        return response()->json([
            'success' => 'Extension Period updated successfully!',
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $extensionPeriod = ExtensionPeriod::findOrFail($id);
            $extensionPeriod->delete();
            DB::commit();
            return response()->json(['success' => 'Extension Period deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => 'An error occurred while deleting the Extension Period.',
                'details' => $e->getMessage()
            ], 500); 
        }
    }
}
