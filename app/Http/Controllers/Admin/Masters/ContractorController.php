<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\Contractor\StoreContractorRequest;
use App\Http\Requests\Admin\Masters\Contractor\UpdateContractorRequest;
use App\Models\Contractor;
use App\Models\ContractorType;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contractorsList = Contractor::latest()->get();
        dd( $contractorsList);
        return view('admin.masters.contractors')->with(['contractorsList'=> $contractorsList]);
        // $contractorsList = Contractor::join('contractor_types', 'contractors.contractor_type', '=', 'contractor_types.id')
        // ->select('contractors.*', 'contractor_types.contractor_type_name')
        // ->whereNull('contractors.deleted_by')
        // ->orderBy('contractors.id', 'desc')
        // ->get();
        // $contractorTypeList = ContractorType::latest()->get();

        // return view('admin.masters.contractors')->with(['contractorsList'=> $contractorsList, 'contractorTypeList' => $contractorTypeList]);
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
    public function store(StoreContractorRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Contractor::create($input);
            DB::commit();

            return response()->json(['success'=> 'Contractor created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Contractor');
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
    public function edit(Contractor $contractor)
    {
        if ($contractor)
        {
            $response = [
                'result' => 1,
                'contractor' => $contractor,
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
    public function update(UpdateContractorRequest $request, Contractor $contractor)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $contractor->update($input);
            DB::commit();

            return response()->json(['success'=> 'Contractor updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'contractor');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contractor $contractor)
    {
        try
        {
            DB::beginTransaction();
            $contractor->delete();
            DB::commit();

            return response()->json(['success'=> 'Contractor deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Contractor');
        }
    }
}
