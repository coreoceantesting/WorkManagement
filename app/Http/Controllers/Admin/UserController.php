<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\AssignUserRoleRequest;
use App\Http\Requests\Admin\ChangeUserPasswordRequest;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::with('department')->latest()->get();

         $users = User::whereNot('users.id', Auth::user()->id)
        ->leftjoin('departments','departments.id','=', 'users.id')
        ->get();

        // echo "<pre>";
        // print_r($users);
        $roles = Role::orderBy('id', 'DESC')->whereNot('name', 'like', '%super%')->get();
        $department_data = Department::all();
        return view('admin.users')->with(['users'=> $users, 'roles'=> $roles, 'department_data'=>$department_data]);
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
    public function store(StoreUserRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['password'] = Hash::make($input['password']);
            $user = User::create( Arr::only( $input, Auth::user()->getFillable() ) );
            DB::table('model_has_roles')->insert(['role_id'=> $input['role'], 'model_type'=> 'App\Models\User', 'model_id'=> $user->id]);
            DB::commit();
            return response()->json(['success'=> 'User created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'User');
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
    
    public function edit(User $user)
    {
        $roles = Role::whereNot('name', 'like', '%super%')->get();
        $user->loadMissing('roles');
        $department = Department::all();
    
        if ($user) {
            // Role HTML generation
            $roleHtml = '<span>
            <option value="">--Select Role--</option>';
            foreach ($roles as $role) {
                $is_select = $role->id == $user->roles[0]->id ? "selected" : "";
                $roleHtml .= '<option value="' . $role->id . '" ' . $is_select . '>' . $role->name . '</option>';
            }
            $roleHtml .= '</span>';
            
            $mastersHtml = '<span>
            <option value="">--Select--</option>';
            foreach ($department as $department) {
                $is_select = $department->id == $department->department_id ? "selected" : "";
                $mastersHtml .= '<option value="' . $department->id . '" ' . $is_select . '>' . $department->department_name . '</option>';
            }
            $mastersHtml .= '</span>';
        
            // Prepare the response with both HTML blocks
            $response = [
                'result' => 1,
                'user' => $user,
                'mastersHtml' => $mastersHtml,  // Include the prefix HTML
                'roleHtml' => $roleHtml,        // Include the role HTML
            ];
        } else {
            $response = ['result' => 0];
        }

    }
        

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $user->update( Arr::only( $input, Auth::user()->getFillable() ) );
            $user->roles()->detach();
            DB::table('model_has_roles')->insert(['role_id'=> $input['role'], 'model_type'=> 'App\Models\User', 'model_id'=> $user->id]);
            DB::commit();

            return response()->json(['success'=> 'User updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'User');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function toggle(Request $request, User $user)
    {
        $current_status = DB::table('users')->where('id', $user->id)->value('active_status');
        try
        {
            DB::beginTransaction();
            if($current_status == '1')
            {
                User::where('id', $user->id)->update([ 'active_status' => '0' ]);
            }
            else
            {
                User::where('id', $user->id)->update([ 'active_status' => '1' ]);
            }
            DB::commit();
            return response()->json(['success'=> 'User status updated successfully']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'changing', 'User\'s status');
        }
    }

    public function retire(Request $request, User $user)
    {
        try
        {
            DB::beginTransaction();
                $user->delete();
            DB::commit();
            return response()->json(['success'=> 'Employee retired successfully']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'changing', 'Employee\'s retirement status');
        }
    }

    public function changePassword(ChangeUserPasswordRequest $request, User $user)
    {
        $input = $request->validated();
        try
        {
            DB::beginTransaction();
            $user->update([ 'password' => Hash::make($input['new_password']) ]);
            DB::commit();
            return response()->json(['success'=> 'Password updated successfully']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'changing', 'User\'s password');
        }

    }


    public function getRole(User $user)
    {
        $user->load('roles');
        if ($user)
        {
            $roles = Role::orderBy('id', 'DESC')->get();
            $roleHtml = '<span>
                <option value="">--Select Role--</option>';
                foreach($roles as $role):
                    $is_select = $role->id == $user->roles[0]->id ? "selected" : "";
                    $roleHtml .= '<option value="'.$role->id.'" '.$is_select.'>'.$role->name.'</option>';
                endforeach;
            $roleHtml .= '</span>';

            $response = [
                'result' => 1,
                'user' => $user,
                'roleHtml' => $roleHtml,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }


    public function assignRole(User $user, AssignUserRoleRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $user->roles()->detach();
            DB::table('model_has_roles')->insert(['role_id'=> $request->edit_role, 'model_type'=> 'App\Models\User', 'model_id'=> $user->id]);
            DB::commit();
            return response()->json(['success'=> 'Role updated successfully']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'changing', 'User\'s role');
        }
    }
}
