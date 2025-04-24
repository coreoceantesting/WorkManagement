<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Models\Item;
use App\Models\Unit;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Models\ItemSubCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\Item\StoreItemRequest;
use App\Http\Requests\Admin\Masters\Item\UpdateItemRequest;

class ItemController extends Controller
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
            $items = Item::query();

            // Optional search
            if ($search = $request->input('search.value')) {
                $items = $items->where('description', 'like', "%{$search}%")
                            ->orWhere('initial', 'like', "%{$search}%");
            }

            $total = $items->count();

            $columns = ['id', 'description', 'initial', 'status'];
            $orderCol = $request->input('order.0.column', 0);
            $orderDir = $request->input('order.0.dir', 'desc');
            $orderBy = $columns[$orderCol];

            $items = $items->orderBy($orderBy, $orderDir)
                        ->skip($request->start)
                        ->take($request->length)
                        ->get();

            $data = [];
            foreach ($items as $index => $item) {
                $data[] = [
                    'DT_RowIndex' => $request->start + $index + 1,
                    'description' => $item->description,
                    'initial' => $item->initial,
                    'status' => $item->status ? 'Active' : 'Inactive',
                    'action' => '<button class="edit-element btn text-secondary px-2 py-1" title="Edit Item" data-id="' . $item->id . '"><i data-feather="edit"></i></button>',
                ];
            }

            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => $total,
                'recordsFiltered' => $total,
                'data' => $data,
            ]);
        }


        $itemCategory = ItemCategory::latest()->active()->get();
        $units = Unit::latest()->active()->get();
        return view('admin.masters.items')->with([
            'units'=>$units,
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
            return $this->respondWithAjax($e, 'updating', 'Item ');
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
