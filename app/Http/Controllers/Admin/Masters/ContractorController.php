<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\Contractor\StoreContractorRequest;
use App\Http\Requests\Admin\Masters\Contractor\UpdateContractorRequest;
use App\Models\Bank;
use App\Models\Contractor;
use App\Models\ContractorType;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class ContractorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:masters.all');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contractors = Contractor::latest();

            // Optional: add search if DataTables sends it
            if ($request->has('search') && $request->search['value']) {
                $search = $request->search['value'];
                $contractors = $contractors->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('company_name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%");
                });
            }

            $total = $contractors->count();

            // Sorting
            $columns = ['id', 'name', 'company_name', 'email', 'status'];
            $columnIndex = $request->input('order.0.column', 0); // fallback to first column
            $columnName = $columns[$columnIndex];
            $sortDirection = $request->input('order.0.dir', 'desc');

            $contractors = $contractors
                ->orderBy($columnName, $sortDirection)
                ->skip($request->start)
                ->take($request->length)
                ->get();

            $data = [];
            foreach ($contractors as $index => $contractor) {
                $data[] = [
                    'DT_RowIndex' => $request->start + $index + 1,
                    'name' => $contractor->name,
                    'company_name' => $contractor->company_name,
                    'email' => $contractor->email,
                    'status' => $contractor->status ? 'Active' : 'Inactive',
                    'bank_account_no' => $contractor->bank_account_no,
                    'action' => '<button class="edit-element btn text-secondary px-2 py-1" title="Edit Contractor" data-id="' . $contractor->id . '"><i data-feather="edit"></i></button>',
                ];
            }

            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => $total,
                'recordsFiltered' => $total,
                'data' => $data,
            ]);
        }

        // If it's not AJAX, return the view
        $contractorCategorys = ContractorType::latest()->active()->get();
        $banks = Bank::latest()->get();

        return view('admin.masters.contractor.contractors')->with([
            'contractorCategorys' => $contractorCategorys,
            'banks'=>$banks
        ]);
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
