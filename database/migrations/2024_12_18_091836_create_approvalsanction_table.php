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
        Schema::create('approvalsanction', function (Blueprint $table) {
            $table->id();
            $table->string('deputy_engineer_sanction');
            $table->string('city_engineer_sanction');  
            $table->string('account_dept_sanction'); 
            $table->string('additional_commissioner_sanction');
            $table->string('commissioner_sanction');
            $table->string('general_body_admin_sanction'); 
            $table->string('standing_committee_sanction');  
            $table->string('resolution_no');  
            $table->string('work_order_date'); 
            $table->string('work_order_no');
            $table->string('work_order_duration_from');  
            $table->string('work_order_duration_to'); 
            $table->string('role');
            $table->string('rolename');
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
        Schema::dropIfExists('approvalsanction');
    }
};
