<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\Field\StoreFieldRequest;
use App\Http\Requests\Admin\Masters\Field\UpdateFieldRequest;
use Illuminate\Http\Request;
use App\Models\Field;
use Illuminate\Support\Facades\DB;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $FieldList = Field::latest()->get();

        return view('admin.masters.Field')->with(['FieldList'=> $FieldList]);
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
    public function store(StoreFieldRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Field::create($input);
            DB::commit();

            return response()->json(['success'=> 'Field created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Field');
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
    public function edit(Field $field)
    {
        if ($field) {
            $response = [
                'result' => 1,
                'field' => $field,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFieldRequest $request, Field $field)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $field->update($input);
            DB::commit();

            return response()->json(['success'=> 'Field updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Field');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $field)
    {
        try
        {
            DB::beginTransaction();
            $field->delete();
            DB::commit();

            return response()->json(['success'=> 'Field deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Field');
        }
    }
}
