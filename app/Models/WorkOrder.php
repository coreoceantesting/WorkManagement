<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class WorkOrder extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = "work_orders";

    protected $fillable = [
        'department',
        'work_order_no',
        'work_order_date',
        'agreement_no',
        'contractor_name',
        'work_name',
        'contract_value',
        'stipulated_completion_period',
        'system_tender_no',
        'system_tender_date',
        'date_of_commitment',
        'work_assignee',
        'document_description',
        'document_upload',
    ];
}
