<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\PaymentMode\StorePaymentModeRequest;
use App\Http\Requests\Admin\Masters\PaymentMode\UpdatePaymentModeRequest;
use App\Models\PaymentMode;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PaymentModeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentModeList = PaymentMode::latest()->get();

        return view('admin.masters.paymentMode')->with(['paymentModeList'=> $paymentModeList]);
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
    public function store(StorePaymentModeRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            PaymentMode::create($input);
            DB::commit();

            return response()->json(['success'=> 'PaymentMode created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'PaymentMode');
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
    public function edit(PaymentMode $paymentMode)
    {
        if ($paymentMode) {
            $response = [
                'result' => 1,
                'paymentMode' => $paymentMode,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentModeRequest $request, PaymentMode $paymentMode)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $paymentMode->update($input);
            DB::commit();

            return response()->json(['success'=> 'paymentMode updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'paymentMode');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMode $paymentMode)
    {
        try
        {
            DB::beginTransaction();
            $paymentMode->delete();
            DB::commit();

            return response()->json(['success'=> 'paymentMode deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'paymentMode');
        }
    }
}
