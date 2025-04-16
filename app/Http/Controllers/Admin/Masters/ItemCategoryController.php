<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Models\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\ItemCategory\StoreItemCategoryRequest;
use App\Http\Requests\Admin\Masters\ItemCategory\UpdateItemCategoryRequest;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemCategories = ItemCategory::latest()->get();

        return view('admin.masters.item_categories')->with(['itemCategories'=> $itemCategories]);
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
    public function store(StoreItemCategoryRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            ItemCategory::create($input);
            DB::commit();

            return response()->json(['success'=> 'Item Category created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Item Category');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemCategory $itemCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemCategory $itemCategory)
    {
        if ($itemCategory) {
            $response = [
                'result' => 1,
                'itemCategory' => $itemCategory,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemCategoryRequest $request, ItemCategory $itemCategory)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $itemCategory->update($input);
            DB::commit();

            return response()->json(['success'=> 'Item Category updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Item Category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemCategory $itemCategory)
    {
        //
    }


    public function subCategories(ItemCategory $itemCategory)
    {
        $response = [
            'result' => 1,
            'itemSubCategory' => $itemCategory->sub_categories??[],
        ];

        return $response;
    }



}
