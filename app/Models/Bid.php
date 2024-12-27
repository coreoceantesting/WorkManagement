<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Bid extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='bid';
    protected $fillable = ['projectname','work_code_no','bidid', 'biddername', 'tech_evaluation_status', 'financial_evaluation_status','rank','ip_address'];

    public function projectinfoData(){
        return $this->belongsTo(Projectinfo::class, 'projectname', 'id');
    }
    public function tenderData(){
        return $this->belongsTo(Tenderentry::class, 'work_code_no', 'id');
    }

    public static function booted()
    {
        static::created(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'created_by'=> Auth::user()->id,
                    'ip_address'=> $_SERVER['REMOTE_ADDR'],
                    
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
