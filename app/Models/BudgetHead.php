<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class BudgetHead extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='budgethead';
    protected $fillable = ['budgetyear','budgetamount','budgethead', 'department','ip_address'];

    public function budgetyearData(){
        return $this->belongsTo(FinancialYear::class,'budgetyear','id');
    }

    public function departmentData()
    {
        return $this->belongsTo(Department::class, 'department', 'id'); // Foreign key should match
    }
    

    public function minorfundData(){
        return $this->belongsTo(MinorFund::class,'budgethead','id');
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
