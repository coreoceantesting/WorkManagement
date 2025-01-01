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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('department')->default('PWD');
            $table->string('project_name');
            $table->text('resolution');
            $table->date('resolution_date');
            $table->date('pre_bid_meeting_date');
            $table->string('meeting_location');
            $table->date('issue_from_date');
            $table->date('issue_till_date');
            $table->date('publish_date');
            $table->date('technical_bid_open_date');
            $table->date('financial_bid_open_date');
            $table->string('tender_category')->default('NIVIDA');
            $table->integer('validity_of_tender_in_days');
            $table->string('bank_guarantee');
            $table->string('additional_performance_sd');
            $table->string('provisional_sum');
            $table->string('deviation_percentage');
            $table->string('upload_document')->nullable();
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
