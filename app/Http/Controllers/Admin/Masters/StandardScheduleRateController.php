<?php

namespace App\Http\Controllers\Admin\Masters;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StandardScheduleRate;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\StandardScheduleRate\StoreStandardScheduleRateRequest;
use App\Http\Requests\Admin\Masters\StandardScheduleRate\UpdateStandardScheduleRateRequest;

class StandardScheduleRateController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:masters.all');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ssr_list = StandardScheduleRate::latest()->get();

        return view('admin.masters.ssr')->with(['ssr_list'=> $ssr_list]);
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
    public function store(StoreStandardScheduleRateRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            StandardScheduleRate::create($input);
            DB::commit();

            return response()->json(['success'=> 'SSR created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'SSR');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StandardScheduleRate $standardScheduleRate)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StandardScheduleRate $standardScheduleRate)
    {

        if ($standardScheduleRate)
        {
            $response = [
                'result' => 1,
                'standard_schedule_rates' => $standardScheduleRate,
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
    public function update(UpdateStandardScheduleRateRequest $request, StandardScheduleRate $standardScheduleRate)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $standardScheduleRate->update($input);
            DB::commit();
            return response()->json(['success'=> 'SSR updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'SSR');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StandardScheduleRate $standardScheduleRate)
    {
        //
    }
}
