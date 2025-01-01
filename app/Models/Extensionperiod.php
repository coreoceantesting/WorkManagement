<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Extensionperiod extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ="extension_period";

    protected $fillable = [
        'agreement_no',
        'contractor_name',
        'agreement_from_date',
        'agreement_to_date',
        'extension_period',
        'document_description',
        'upload_document',
    ];
}
