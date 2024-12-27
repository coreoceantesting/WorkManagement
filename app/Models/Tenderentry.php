<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
class Tenderentry extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='tenderentry';
    protected $fillable = ['projectname', 
                            'workname',
                            'vendorname',
                            'tender_accepted_cost',
                            'work_code_no',
                            'tenderentry' ,
                            'budgetdate',
                            'proposalcost',
                            'tendercost',
                            'ip_address'];

    public function projectinfoData(){
        return $this->belongsTo(Projectinfo::class,'projectname','id');
    }
                            
    public function vendorData(){
        return $this->belongsTo(Contractor::class,'vendorname','id');
    }

    public function workdefinationData()
    {
        return $this->belongsTo(Workdefinition::class, 'workname', 'id'); // Foreign key should match
    }
    
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
