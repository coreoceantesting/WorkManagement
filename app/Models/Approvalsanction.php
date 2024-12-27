<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Approvalsanction extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='approvalsanction';
    protected $fillable = ['deputy_engineer_sanction','city_engineer_sanction','account_dept_sanction','additional_commissioner_sanction','commissioner_sanction','general_body_admin_sanction','standing_committee_sanction','resolution_no','work_order_date','work_order_no','work_order_duration_from','work_order_duration_to','role','rolename'];

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
