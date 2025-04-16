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
        Schema::create('contractors', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('company_name',100);
            $table->string('email',100);
            $table->text('address');
            $table->string('mobile_no',11);
            $table->string('aadhaar_no',11);
            $table->string('gst_no',25);
            $table->string('vat_no',25);
            $table->string('pan_no',25);
            $table->string('bank_name',100);
            $table->string('bank_branch',100);
            $table->string('ifsc_code',50);
            $table->string('bank_account_no',50);
            $table->foreignId('contractor_type_id')->nullable()->constrained('contractor_types')->nullOnDelete();
            $table->foreignId('contractor_sub_type_id')->nullable()->constrained('contractor_sub_types')->nullOnDelete();
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
        Schema::dropIfExists('contractors');
    }
};
