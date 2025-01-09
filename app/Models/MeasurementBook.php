<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class MeasurementBook extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'measurementbook';

    protected $fillable = [
        'work_order_number',
        'work_order_account',
        'agreement_form_date',
        'agreement_to_date',
        'work_order_date',
        'agreement_no',
        'measurement_date',
        'ledger_no',
        'description',
        'pages_no',
        'engineer_name',
    ];
}
