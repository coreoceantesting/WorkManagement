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
        Schema::create('physicalmilestone', function (Blueprint $table) {
            $table->id();
            $table->string('projectname')->nullable();
            $table->string('workname')->nullable();
            $table->string('description')->nullable();
            $table->string('weightage')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('amount');
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
        Schema::dropIfExists('physicalmilestone');
    }
};
