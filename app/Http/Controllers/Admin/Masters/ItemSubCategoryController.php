<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Models\ItemSubCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\ItemSubCategory\StoreItemCategoryRequest;
use App\Http\Requests\Admin\Masters\ItemSubCategory\StoreItemSubCategoryRequest;
use App\Http\Requests\Admin\Masters\ItemSubCategory\UpdateItemSubCategoryRequest;

class ItemSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemSubCategory = ItemSubCategory::with('category')->latest()->get();
        $itemCategory = ItemCategory::latest()->get();
        return view('admin.masters.item_sub_categories')->with([
            'item_sub_category'=> $itemSubCategory,
            'item_categories'=>$itemCategory
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
    public function store(StoreItemSubCategoryRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            ItemSubCategory::create($input);
            DB::commit();

            return response()->json(['success'=> 'Item Sub Category created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Item Sub Category');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemSubCategory $itemSubCategory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemSubCategory $itemSubCategory)
    {
        if ($itemSubCategory) {
            $response = [
                'result' => 1,
                'itemSubCategory' => $itemSubCategory,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemSubCategoryRequest $request, ItemSubCategory $itemSubCategory)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $itemSubCategory->update($input);
            DB::commit();

            return response()->json(['success'=> 'Item Sub Category updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Item Sub Category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemSubCategory $itemSubCategory)
    {
        //
    }
}
