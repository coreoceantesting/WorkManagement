<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\admin\masters\Asset\StoreAssetRequest;
use App\Http\Requests\admin\masters\Asset\UpdateAssetRequest;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assetList = Asset::latest()->get();

        return view('admin.masters.asset')->with(['assetList'=> $assetList]);
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
    public function store(StoreAssetRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            // dd($input);
            Asset::create($input);
            DB::commit();

            return response()->json(['success'=> 'Asset created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Asset');
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
    public function edit(asset $asset)
    {
        if ($asset) {
            $response = [
                'result' => 1,
                'asset' => $asset,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssetRequest $request, asset $asset)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $asset->update($input);
            DB::commit();

            return response()->json(['success'=> 'Asset updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Asset');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(asset $asset)
    {
        try
        {
            DB::beginTransaction();
            $asset->delete();
            DB::commit();

            return response()->json(['success'=> 'Asset deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Asset');
        }
    }
    
}
