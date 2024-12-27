<?php

namespace App\Http\Controllers\Admin\Form;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Form\StoreFormRequest;
use App\Http\Requests\admin\Form\UpdateFormRequest;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formList =[];

        return view('admin.form.form')->with(['formList'=> $formList]);
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
    public function store(StoreFormRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            // dd($input);
            Form::create($input);
            DB::commit();

            return response()->json(['success'=> 'Form created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Form');
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
    public function edit(form $form)
    {
        if ($form) {
            $response = [
                'result' => 1,
                'form' => $form,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormRequest $request, form $form)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $form->update($input);
            DB::commit();

            return response()->json(['success'=> 'Form updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Form');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(form $form)
    {
        try
        {
            DB::beginTransaction();
            $form->delete();
            DB::commit();

            return response()->json(['success'=> 'Form deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Form');
        }
    }
}
