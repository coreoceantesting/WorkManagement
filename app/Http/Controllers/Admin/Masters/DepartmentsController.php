<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\Departments\StoreDepartmentRequest;
use App\Http\Requests\Admin\Masters\Departments\UpdateDepartmentRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departmentsList = Department::latest()->get();

        return view('admin.masters.departments')->with(['departmentsList'=> $departmentsList]);
    }

    public function getuserBydepartment($department)
    {
        $user = User::where('departname_name', $department)->get();
        return response()->json($user);
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
    public function store(StoreDepartmentRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Department::create($input);
            DB::commit();

            return response()->json(['success'=> 'Department created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Department');
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
    public function edit(Department $department)
    {
        if ($department)
        {
            $response = [
                'result' => 1,
                'department' => $department,
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
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $department->update($input);
            DB::commit();

            return response()->json(['success'=> 'Department updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Department');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try
        {
            DB::beginTransaction();
            $department->delete();
            DB::commit();

            return response()->json(['success'=> 'Department deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'department');
        }
    }
}
