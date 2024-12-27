<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class MinorFund extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='minorfund';
    protected $fillable = [
        'major_fund_code', 
        'minor_fund_code',
        'minor_fund_code_description', 
        'status',
        'ip_address'];


        public function majorfund(){
            return $this->belongsTo(MajorFund::class,'id','major_fund_code');
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
