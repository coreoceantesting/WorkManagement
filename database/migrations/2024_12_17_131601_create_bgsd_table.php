<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bgsd', function (Blueprint $table) {
            $table->id();
            $table->string('defectliabilityperiod'); 
            $table->string('securitydeposit');  
            $table->string('bankname'); 
            $table->string('securitydepositvalidity');
            $table->string('securitydepositamount');
            $table->string('extentiondate'); 
            $table->string('completiondate');  
            $table->string('oldtendorvalue'); 
            $table->string('tenderdate');
            $table->string('tap');
            $table->string('ip_address')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bgsd');
    }
};
