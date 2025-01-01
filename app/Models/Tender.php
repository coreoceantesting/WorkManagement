<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Tender extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ="tenders";

    protected $fillable = [
        'department',
        'project_name',
        'resolution',
        'resolution_date',
        'pre_bid_meeting_date',
        'meeting_location',
        'issue_from_date',
        'issue_till_date',
        'publish_date',
        'technical_bid_open_date',
        'financial_bid_open_date',
        'tender_category',
        'validity_of_tender_in_days',
        'bank_guarantee',
        'additional_performance_sd',
        'provisional_sum',
        'deviation_percentage',
        'upload_document',
    ];
}
