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
        Schema::create('tenderexecution', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('projectname');
            $table->string('resolution');
            $table->string('resolution_date');
            $table->string('pre_bid_meeting_date');
            $table->string('meeting_location');
            $table->string('issue_from_date');
            $table->string('issue_till_date');
            $table->string('publish_date');
            $table->string('technical_bid_open_date');
            $table->string('financial_bid_open_date');
            $table->string('tender_category');
            $table->string('validity_of_tender');
            $table->string('bank_guarantee');
            $table->string('addition_performance_sd');
            $table->string('provisional_sum');
            $table->string('devaluation_percentage');
            $table->string('upload_document');
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
        Schema::dropIfExists('tenderexecution');
    }
};
