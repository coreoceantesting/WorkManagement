<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class PhysicalMilestone extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'physicalmilestone';

    protected $fillable = [
        'projectname',
        'workname',
        'description',
        'weightage',
        'start_date',
        'end_date',
        'amount',
    ];
}
