<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class TenderExecution extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='tenderexecution';
    protected $fillable = ['department', 
                            'projectname',
                            'resolution',
                            'resolution_date',
                            'pre_bid_meeting_date',
                            'meeting_location' ,
                            'issue_from_date',
                            'issue_till_date',
                            'publish_date',
                            'technical_bid_open_date',
                            'financial_bid_open_date',
                            'tender_category', 
                            'validity_of_tender',
                            'bank_guarantee',
                            'addition_performance_sd',
                            'provisional_sum' ,
                            'devaluation_percentage',
                            'upload_document',
                            'ip_address'];

    public static function booted()
    {
        static::created(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'created_by'=> Auth::user()->id,
                ]);
            }
        });
        static::updated(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'updated_by'=> Auth::user()->id,
                ]);
            }
        });
        static::deleting(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'deleted_by'=> Auth::user()->id,
                ]);
            }
        });
    }
}
