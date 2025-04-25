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
            $table->string('name',100)->nullable();
            $table->string('company_name',100)->nullable();
            $table->string('email',100)->nullable();
            $table->text('address')->nullable();
            $table->string('mobile_no',11)->nullable();
            $table->string('aadhaar_no',15)->nullable();
            $table->string('gst_no',25)->nullable();
            $table->string('vat_no',25)->nullable();
            $table->string('pan_no',25)->nullable();
            $table->foreignId('bank_id')->nullable()->constrained('banks')->nullOnDelete();
            $table->string('bank_branch_name',100)->nullable();
            $table->string('ifsc_code',50)->nullable();
            $table->string('bank_account_no',50)->nullable();
            $table->foreignId('contractor_type_id')->nullable()->constrained('contractor_types')->nullOnDelete();
            $table->foreignId('contractor_sub_type_id')->nullable()->constrained('contractor_sub_types')->nullOnDelete();
            $table->tinyInteger('status')->default(1)->comment('1 = active, 0 = inactive');
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
