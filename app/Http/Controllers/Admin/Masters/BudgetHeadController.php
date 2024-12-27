<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\Budgethead\StoreBudgetheadRequest;
use App\Http\Requests\Admin\Masters\Budgethead\UpdateBudgetheadRequest;
use App\Models\BudgetHead;
use App\Models\Department;
use App\Models\FinancialYear;
use App\Models\MinorFund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $budgetheadList = BudgetHead::with('departmentData', 'minorfundData', 'budgetyearData')->get();


        // echo "<pre>";
        // print_r($budgetheadList);
        // die;
       
        $data['budgetheads'] = FinancialYear::latest()->get();
        $data['departments'] = Department::latest()->get();
        $data['minor_funds'] = MinorFund::latest()->get();

      
        return view('admin.masters.budgethead',compact('budgetheadList'), $data);
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
    public function store(StoreBudgetheadRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            BudgetHead::create($input);
            DB::commit();

            return response()->json(['success'=> 'Budget created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Budget Head');
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
    public function edit(budgetHead $budgethead)
    {
        $financialyear = FinancialYear::all();
        $department = Department::all();
        $minorfund = MinorFund::all();

        if ($budgethead) {
            $mastersHtml = '<span>
            <option value="">--Select--</option>';
            foreach ($financialyear as $financialyear):
                $is_select = $financialyear->id == $budgethead->budgetyear ? "selected" : "";
                $mastersHtml .= '<option value="' . $financialyear->id . '" ' . $is_select . '>' . $financialyear->title.'</option>';
            endforeach;
            $mastersHtml .= '</span>';

            $mastersHtml1 = '<span>
            <option value="">--Select--</option>';
            foreach ($department as $department):
                $is_select = $department->id == $budgethead->department ? "selected" : "";
                $mastersHtml1 .= '<option value="' . $department->id . '" ' . $is_select . '>' . $department->department_name.'</option>';
            endforeach;
            $mastersHtml1 .= '</span>';  

            $mastersHtml2 = '<span>
            <option value="">--Select--</option>';
            foreach ($minorfund as $minorfund):
                $is_select = $minorfund->id == $budgethead->budgethead ? "selected" : "";
                $mastersHtml2 .= '<option value="' . $minorfund->id . '" ' . $is_select . '>' . $minorfund->minor_fund_code.$minorfund->minor_fund_code_description.'</option>';
            endforeach;
            $mastersHtml2 .= '</span>';  

            $response = [
                'result' => 1,
                'budgethead' => $budgethead,
                'mastersHtml' => $mastersHtml,
                'mastersHtml1' => $mastersHtml1,
                'mastersHtml2' => $mastersHtml2
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBudgetheadRequest $request, BudgetHead $budgethead)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $budgethead->update($input);
            DB::commit();

            return response()->json(['success'=> 'Budget head updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Budgethead');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BudgetHead $budgethead)
    {
        try
        {
            DB::beginTransaction();
            $budgethead->delete();
            DB::commit();

            return response()->json(['success'=> 'Budget Head deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Budgethead');
        }
    }
}
