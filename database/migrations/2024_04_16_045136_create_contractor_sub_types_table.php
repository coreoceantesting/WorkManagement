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
        Schema::create('contractor_sub_types', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100)->nullable();
            $table->string('initial', 100);
            $table->foreignId('contractor_type_id')->nullable()->constrained('contractor_types')->nullOnDelete();
            $table->tinyInteger('status')->default(1)->comment('1 = active, 0 = inactive');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractor_sub_types');
    }
};
