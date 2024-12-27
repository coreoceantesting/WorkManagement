<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class FinancialInfo extends Model
{
    use HasFactory;
    protected $table='financialinfo';
    public $timestamps = false;

    protected $fillable = ['projectinfo_id','title','budgetamount','field_name','remark'];

    public function financialData(){
        return $this->belongsTo(FinancialYear::class,'title','id');
    }

    public function budgetData()
    {
        return $this->belongsTo(BudgetHead::class, 'budgetamount', 'id'); // Foreign key should match
    }
    

    public function fieldData(){
        return $this->belongsTo(Field::class,'field_name','id');
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
