<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\masters\ApprovalSanction\StoreApprovalSanctionRequest;
use App\Http\Requests\admin\masters\ApprovalSanction\UpdateApprovalSanctionRequest;
use App\Models\Approvalsanction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalSanctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approvalsanction = Approvalsanction::latest()->get();

        return view('admin.masters.approvalsanction')->with(['approvalsanction'=> $approvalsanction]);
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
    public function store(StoreApprovalSanctionRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            // dd($input);
            Approvalsanction::create($input);
            DB::commit();

            return response()->json(['success'=> 'Approval and Sanction created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'ApprovalSanction');
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
    public function edit(Approvalsanction $approvalsanction)
    {
        if ($approvalsanction) {
            $response = [
                'result' => 1,
                'approvalsanction' => $approvalsanction,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApprovalSanctionRequest $request, Approvalsanction $approvalsanction)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $approvalsanction->update($input);
            DB::commit();

            return response()->json(['success'=> 'Approval and Sanction updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'ApprovalSanction');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Approvalsanction $approvalsanction)
    {
        try
        {
            DB::beginTransaction();
            $approvalsanction->delete();
            DB::commit();

            return response()->json(['success'=> 'Approval and Sanction deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'ApprovalSanction');
        }
    }
}
