<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\masters\Tax\StoreTaxRequest;
use App\Http\Requests\admin\masters\Tax\UpdateTaxRequest;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tax = Tax::latest()->get();

        return view('admin.masters.tax')->with(['tax'=> $tax]);
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
    public function store(StoreTaxRequest $request)
{
    try {
        DB::beginTransaction();
        $input = $request->validated();
        if ($request->hasFile('taxfile') && $request->file('taxfile')->isValid()) {
            $file = $request->file('taxfile');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('taxes', $fileName, 'public');
            $input['taxfile'] = $filePath;
        }

        Tax::create($input);

        DB::commit();

        return response()->json(['success' => 'Tax created successfully!']);
    } catch (\Exception $e) {
        DB::rollBack();
        return $this->respondWithAjax($e, 'creating', 'Tax');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Tax $tax)
    {
        $tax = Tax::latest()->get();

        return view('admin.masters.tax')->with(['tax'=> $tax]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tax $tax)
    {
        if ($tax)
        {
            $response = [
                'result' => 1,
                'tax' => $tax,
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
    public function update(UpdateTaxRequest $request, tax $tax)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $tax->update($input);
            DB::commit();

            return response()->json(['success'=> 'Tax updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Tax');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tax $tax)
    {
        try
        {
            DB::beginTransaction();
            $tax->delete();
            DB::commit();

            return response()->json(['success'=> 'Tax deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Tax');
        }
    }
}
