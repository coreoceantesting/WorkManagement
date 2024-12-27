<?php

namespace App\Models;

use App\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Workdefinition extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='workdefinition';
    protected $fillable = ['workcode', 'projectname','workname','department','typeofwork','proposalnumber','categoryofwork','probablecompletiondate','projectphase' ,'workdone','probablecommencementdate','subtype','ip_address'];

    public function projectinfoData(){
        return $this->belongsTo(Projectinfo::class, 'projectname', 'id');
    }

    public function departmentName()
    {
        return $this->belongsTo(Department::class, 'department', 'id'); // Foreign key should match
    }

    public function categoryofworkData(){
        return $this->belongsTo(COW::class,'categoryofwork','id');
    }
    
    public function proData(){
        return $this->belongsTo(ProjectData::class,'projectphase','id');
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
