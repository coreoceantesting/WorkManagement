<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface StandardScheduleRateContract
{
    public function index();

    public function store(Request $request);

    public function show($id);

    public function update(Request $request, $id);

    public function destroy($id);
}
