<?php

namespace App\Imports;

use App\Models\Rate_Type;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class RateImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // print_r($row);die;
        return new Rate_Type([
            'SORmain'     => $row['sormain'],
            'fromdate'    => $row['fromdate'], 
            'todate'    => $row['todate'],
        ]);
    }
}
