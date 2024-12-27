<?php

namespace App\Http\Controllers\Admin\Prefix;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Prefix\prefixdetail\StoreprefixdetailRequest;
use App\Http\Requests\Admin\Prefix\prefixdetail\UpdateprefixdetailRequest;
use App\Models\mainprefix;
use Illuminate\Http\Request;
use App\Models\prefixdetail;
use Illuminate\Support\Facades\DB;

class prefixdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prefixdetail = Prefixdetail::with('mainprefix')->latest()->get();
        // return $prefixdetail;
        $mainprefix = mainprefix::all();
        return view('admin.prefix.prefixdetail')->with(['mainprefix'=> $mainprefix,'prefixdetail'=> $prefixdetail]);
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
    public function store(StoreprefixdetailRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            prefixdetail::create($input);
            DB::commit();

            return response()->json(['success'=> 'Prefix Details created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'prefixdetails');
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
    public function edit(prefixdetail $prefixdetail)
    {
        $mainprefix = mainprefix::all();
        
        if ($prefixdetail) 
        {
            $mastersHtml = '<span>
            <option value="">--Select--</option>';
            foreach ($mainprefix as $mainprefix):
                $is_select = $mainprefix->id == $prefixdetail->mainprefix_id ? "selected" : "";
                $mastersHtml .= '<option value="' . $mainprefix->id . '" ' . $is_select . '>' . $mainprefix->description.'</option>';
            endforeach;
            $mastersHtml .= '</span>';

            // $mastersHtml1 = '<span>
            // <option value="">--Select--</option>';
            // foreach ($mainprefix as $mainprefix):
            //     $is_select = $mainprefix->id == $prefixdetail->mainprefix_id ? "selected" : "";
            //     $mastersHtml .= '<option value="' . $mainprefix->id . '" ' . $is_select . '>' . $mainprefix->name.'</option>';
            // endforeach;
            // $mastersHtml1 .= '</span>';
            
            
            $response = [
                'result' => 1,
                'prefixdetail' => $prefixdetail,
                'mastersHtml' => $mastersHtml,  
                // 'mastersHtml1' => $mastersHtml1,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprefixdetailRequest $request, prefixdetail $prefixdetail)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $prefixdetail->update($input);
            DB::commit();

            return response()->json(['success'=> 'Prefix Details updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'prefixdetail');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prefixdetail $prefixdetail)
    {
        try
        {
            DB::beginTransaction();
            $prefixdetail->delete();
            DB::commit();

            return response()->json(['success'=> 'Prefix Detail deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'prefixdetail');
        }
    }
}
