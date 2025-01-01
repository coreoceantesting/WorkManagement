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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('department')->nullable();
            $table->string('work_order_no')->nullable();
            $table->date('work_order_date')->nullable;
            $table->string('agreement_no')->nullable;
            $table->string('contractor_name')->nullable;
            $table->string('work_name')->nullable;
            $table->integer('contract_value')->nullable;
            $table->string('stipulated_completion_period')->nullable; 
            $table->string('system_tender_no')->nullable;
            $table->date('system_tender_date')->nullable;
            $table->date('date_of_commitment')->nullable;
            $table->string('work_assignee')->nullable;
            $table->text('document_description')->nullable;
            $table->string('document_upload')->nullable;  
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
        Schema::dropIfExists('work_orders');
    }
};
