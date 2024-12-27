<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Projectinfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='projectinfo';

    protected $fillable = [
        'projectno',
        'department',
        'projectnameenglish',
        'projectnameregional',
        'projectdescription',
        'projecttimeline',
        'projectstartdate',
        'projectenddate',
        'schemename',
        'approvalnumber',
        'approvaldate',
        'status',
        'ip_address'
    ];

    public function statusData(){
        return $this->belongsTo(ProjectData::class,'status','id');
    }

    public function schemeData(){
        return $this->belongsTo(Scheme::class,'schemename','id');
    }

    public function departmentData()
    {
        return $this->belongsTo(Department::class, 'department', 'id'); // Foreign key should match
    }

    public function documentData()
    {
        return $this->hasMany(Document::class,'projectinfo_id');
    }

    public function fiancialData()
    {
        return $this->hasMany(FinancialInfo::class,'projectinfo_id');
    }

    public function financialData()
    {
        return $this->belongsTo(FinancialYear::class,'title','id');
    }

    public function budgetData()
    {
        return $this->belongsTo(BudgetHead::class, 'budgetamount', 'id'); // Foreign key should match
    }
    
    public function fieldData()
    {
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
