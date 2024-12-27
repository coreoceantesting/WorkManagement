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
        Schema::create('tenderentry', function (Blueprint $table) {
            $table->id();
            $table->string('projectname');
            $table->string('workname');  
            $table->string('vendorname'); 
            $table->string('tender_accepted_cost');
            $table->string('work_code_no');
            $table->string('tenderentry'); 
            $table->string('budgetdate');  
            $table->string('proposalcost'); 
            $table->string('tendercost');
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
        Schema::dropIfExists('tenderentry');
    }
};
