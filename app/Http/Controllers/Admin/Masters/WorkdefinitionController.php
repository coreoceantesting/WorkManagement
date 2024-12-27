<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\admin\masters\Workdefinition\StoreWorkdefinitionRequest;
use App\Http\Requests\admin\masters\Workdefinition\UpdateWorkdefinitionRequest;
use App\Models\COW;
use App\Models\Department;
use App\Models\ProjectData;
use App\Models\Projectinfo;
use App\Models\Workdefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkdefinitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $workdefinitionList = Workdefinition::with('departmentName', 'projectinfoData', 'categoryofworkData','proData')->get();
    

        // echo "<pre>";
        // print_r($workdefinitionList);
        // die;
       
        $data['projectinfo'] = Projectinfo::latest()->get();
        $data['departments'] = Department::latest()->get();
        $data['projects'] = ProjectData::latest()->get();
        $data['categoryofwork'] = COW::latest()->get();
        
      
        return view('admin.masters.workdefinition',compact('workdefinitionList'), $data);
    }

    public function getDepartment($ProjectID)
    {
        $projectinfo = Projectinfo::where('id', $ProjectID)->first();
        $department = Department::where('id', $projectinfo->department)->get();
        // dd($department);
        return response()->json($department);
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
    public function store(StoreWorkdefinitionRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Workdefinition::create($input);
            DB::commit();

            return response()->json(['success'=> 'Work Definition created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Workdefinition');
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
    public function edit(Workdefinition $workdefinition)
    {
        $projectinfo = Projectinfo::all();
        $department = Department::all();
        $project = ProjectData::all();
        $categoryofwork=COW::all();

        if ($workdefinition) {
            $mastersHtml = '<span>
            <option value="">--Select--</option>';
            foreach ($projectinfo as $info):
                $is_select = $info->id == $workdefinition->projectname ? "selected" : "";
                $mastersHtml .= '<option value="' . $info->id . '" ' . $is_select . '>' . $info->projectnameenglish.'</option>';
            endforeach;
            $mastersHtml .= '</span>';

            $mastersHtml1 = '<span>
            <option value="">--Select--</option>';
            foreach ($department as $department):
                $is_select = $department->id == $workdefinition->department ? "selected" : "";
                $mastersHtml1 .= '<option value="' . $department->id . '" ' . $is_select . '>' . $department->department_name.'</option>';
            endforeach;
            $mastersHtml1 .= '</span>';  

            $mastersHtml2 = '<span>
            <option value="">--Select--</option>';
            foreach ($project as $pro):
                $is_select = $pro->id == $workdefinition->projectphase ? "selected" : "";
                $mastersHtml2 .= '<option value="' . $pro->id . '" ' . $is_select . '>' . $pro->phase.'</option>';
            endforeach;
            $mastersHtml2 .= '</span>';  
            
            $mastersHtml3 = '<span>
            <option value="">--Select--</option>';
            foreach ($categoryofwork as $category):
                $is_select = $category->id == $workdefinition->categoryofwork ? "selected" : "";
                $mastersHtml3 .= '<option value="' . $category->id . '" ' . $is_select . '>' . $category->cow_name.'</option>';
            endforeach;
            $mastersHtml3.= '</span>';  

            $response = [
                'result' => 1,
                'workdefinition' => $workdefinition,
                'mastersHtml' => $mastersHtml,
                'mastersHtml1' => $mastersHtml1,
                'mastersHtml2' => $mastersHtml2,
                'mastersHtml3' => $mastersHtml3
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkdefinitionRequest $request, workdefinition $workdefinition)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $workdefinition->update($input);
            DB::commit();

            return response()->json(['success'=> 'Work Definition updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'workdefinition');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(workdefinition $workdefinition)
    {
        try
        {
            DB::beginTransaction();
            $workdefinition->delete();
            DB::commit();

            return response()->json(['success'=> 'Work Definition deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'workdefinition');
        }
    }
}
