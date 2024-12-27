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
        Schema::create('projectinfo', function (Blueprint $table) {
            $table->id();
            $table->string('projectno');  
            $table->string('department'); 
            $table->string('projectnameenglish');
            $table->string('projectnameregional');
            $table->string('projectdescription');  
            $table->string('projecttimeline'); 
            $table->string('projectstartdate');
            $table->string('projectenddate');
            $table->string('schemename');
            $table->string('status');
            $table->string('approvalnumber');
            $table->string('approvaldate');
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
        Schema::dropIfExists('projectinfo');
    }
};