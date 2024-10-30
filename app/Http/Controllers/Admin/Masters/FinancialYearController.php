<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Models\FinancialYear;
use App\Http\Requests\Admin\Masters\FinancialYear\StoreFinancialYearRequest;
use App\Http\Requests\Admin\Masters\FinancialYear\UpdateFinancialYearRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class FinancialYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $financial_year = FinancialYear::latest()->get();

        return view('admin.masters.financialYear')->with(['financial_years' => $financial_year]);

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
    public function store(StoreFinancialYearRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            if (isset($input['is_active']) && $input['is_active'] == 1) {
                FinancialYear::where('is_active', '=', '1')
                    ->update(['is_active' => '0']);
            }
            FinancialYear::create($input);
            DB::commit();

            return response()->json(['success' => 'Financial Year created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Financial Year');
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
    public function edit(FinancialYear $financialYear)
    {
        if ($financialYear) {
            $response = [
                'result' => 1,
                'financialYear' => $financialYear,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinancialYearRequest $request, FinancialYear $financialYear)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            if (isset($input['is_active']) && $input['is_active'] == 1) {
                FinancialYear::where('is_active', '=', '1')
                    ->update(['is_active' => '0']);
            }
            $financialYear->update($input);
            DB::commit();

            return response()->json(['success' => 'Financial Year updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Financial Year');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialYear $financialYear)
    {
        try {
            DB::beginTransaction();
            $financialYear->delete();
            DB::commit();
            return response()->json(['success' => 'Financial Year deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Financial Year');
        }

    }
}
