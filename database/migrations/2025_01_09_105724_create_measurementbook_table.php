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
        Schema::create('measurementbook', function (Blueprint $table) {
            $table->id(); 
            $table->string('work_order_number'); 
            $table->string('work_order_account'); 
            $table->date('agreement_form_date'); 
            $table->date('agreement_to_date'); 
            $table->date('work_order_date');
            $table->string('agreement_no');
            $table->date('measurement_date'); 
            $table->string('ledger_no');
            $table->text('description'); 
            $table->integer('pages_no');
            $table->string('engineer_name');
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
        Schema::dropIfExists('measurementbook');
    }
};
