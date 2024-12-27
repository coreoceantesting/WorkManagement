<?php

namespace App\Http\Controllers\Admin\Prefix;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Prefix\mainprefix\StoremainprefixRequest;
use App\Http\Requests\Admin\Prefix\mainprefix\UpdatemainprefixRequest;
use Illuminate\Http\Request;
use App\Models\mainprefix;
use Illuminate\Support\Facades\DB;
use App\Models\prefixdetail;

class mainprefixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainprefix = Mainprefix::latest()->get();

        return view('admin.prefix.mainprefix')->with(['mainprefix'=> $mainprefix]);
    }

    public function getprefixdetailBymainprefix($mainprefix)
    {
        $prefixdetail = prefixdetail::where('description', $mainprefix)->get();
        return response()->json($prefixdetail);
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
    public function store(StoremainprefixRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            mainprefix::create($input);
            DB::commit();

            return response()->json(['success'=> 'Main Prefix created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'mainprefix');
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
    public function edit(mainprefix $mainprefix)
    {
        if ($mainprefix) {
            $response = [
                'result' => 1,
                'mainprefix' => $mainprefix,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemainprefixRequest $request, mainprefix $mainprefix)
    {
        try
        {
            // $mainprefix = mainprefixController::find($id);
            DB::beginTransaction();
            $input = $request->validated();
            $mainprefix->update($input);
            DB::commit();

            return response()->json(['success'=> 'Main Prefix updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'mainprefix');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mainprefix $mainprefix)
    {
        try
        {
            DB::beginTransaction();
            $mainprefix->delete();
            DB::commit();

            return response()->json(['success'=> 'Main Prefix deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'mainprefix');
        }
    }
}
