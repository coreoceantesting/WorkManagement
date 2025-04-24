<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'initial',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function sub_categories(){
        return $this->hasMany(ItemSubCategory::class)->active();
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
