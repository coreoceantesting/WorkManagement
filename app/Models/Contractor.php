<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contractor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'unique_number',
        'name',
        'company_name',
        'email',
        'address',
        'mobile_no',
        'aadhaar_no',
        'gst_no',
        'vat_no',
        'pan_no',
        'bank_id',
        'bank_branch',
        'ifsc_code',
        'bank_account_no',
        'contractor_type_id',
        'contractor_sub_type_id',
        'status',
        'bank_branch_name',
    ];




    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public static function booted()
    {
        static::creating(function (self $user) {
            // Generate the contractor's unique number
            $latestContractor = self::orderBy('id', 'desc')->first(); // Get the latest contractor
            $sequenceNumber = 1;

            // If there are contractors already, calculate the next sequence number
            if ($latestContractor) {
                $lastNumber = (int) substr($latestContractor->unique_number, 1); // Extract the numeric part
                $sequenceNumber = $lastNumber + 1; // Increment by 1
            }

            // Generate the unique number with leading zeroes, ensuring a 5-digit format
            $user->unique_number = 'C' . str_pad($sequenceNumber, 5, '0', STR_PAD_LEFT); // 'C00001', 'C00002', etc.
        });
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
