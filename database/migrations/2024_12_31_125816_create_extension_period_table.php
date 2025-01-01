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
        Schema::create('extension_period', function (Blueprint $table) {
            $table->id();
            $table->string('agreement_no');
            $table->string('contractor_name');
            $table->date('agreement_from_date');
            $table->date('agreement_to_date');
            $table->enum('extension_period', ['days', 'hours', 'months', 'years']);
            $table->string('document_description')->nullable();
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
        Schema::dropIfExists('extension_period');
    }
};
