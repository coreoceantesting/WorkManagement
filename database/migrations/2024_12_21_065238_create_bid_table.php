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
        Schema::create('bid', function (Blueprint $table) {
            $table->id();
            $table->string('projectname');
            $table->string('work_code_no');
            $table->string('bidid');
            $table->string('biddername');
            $table->string('tech_evaluation_status');
            $table->string('financial_evaluation_status');
            $table->string('rank');
            $table->string('ip_address')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
            // protected $fillable = ['projectname','work_code_no','bidid', 'biddername', 'tech_evaluation_status', 'financial_evaluation_status','rank','ip_address'];

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bid');
    }
};
