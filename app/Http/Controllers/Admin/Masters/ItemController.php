<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\ItemSubCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\Item\StoreItemRequest;
use App\Http\Requests\Admin\Masters\Item\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemSubCategory = ItemSubCategory::latest()->get();
        $items = Item::latest()->get();
        return view('admin.masters.items')->with([
            'items'=> $items,
            'item_categories'=>$itemSubCategory
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
    public function store(StoreItemRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Item::create($input);
            DB::commit();

            return response()->json(['success'=> 'Item created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Item ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        if ($item) {
            $response = [
                'result' => 1,
                'item' => $item,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $item->update($input);
            DB::commit();

            return response()->json(['success'=> 'Item  updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Item Category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
