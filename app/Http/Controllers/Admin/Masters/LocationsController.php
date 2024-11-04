<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\Locations\StoreLocationRequest;
use App\Http\Requests\Admin\Masters\Locations\UpdateLocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locationList = Location::latest()->get();

        return view('admin.masters.locations')->with(['locationList'=> $locationList]);
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
    public function store(StoreLocationRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Location::create($input);
            DB::commit();

            return response()->json(['success'=> 'Location created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Location');
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
    public function edit(Location $location)
    {
        if ($location)
        {
            $response = [
                'result' => 1,
                'location' => $location,
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
    public function update(UpdateLocationRequest $request, Location $location)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $location->update($input);
            DB::commit();

            return response()->json(['success'=> 'Location updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Location');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        try
        {
            DB::beginTransaction();
            $location->delete();
            DB::commit();

            return response()->json(['success'=> 'Location deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Location');
        }
    }
}
