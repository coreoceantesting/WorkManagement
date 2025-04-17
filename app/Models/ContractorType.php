<?php

namespace App\Models;

use App\Models\ContractorSubType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContractorType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['contractor_type_name', 'initial','status'];


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function contractor_sub_types(){
        return $this->hasMany(ContractorSubType::class)->active();
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
