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
        Schema::create('workdefinition', function (Blueprint $table) {
            $table->id();
            $table->string('workcode');  
            $table->string('projectname'); 
            $table->string('workname');
            $table->string('department');
            $table->string('typeofwork');  
            $table->string('proposalnumber'); 
            $table->string('categoryofwork');
            $table->string('probablecompletiondate');
            $table->string('probablecommencementdate');
            $table->string('projectphase');
            $table->string('workdone');
            $table->string('subtype');
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
        Schema::dropIfExists('workdefinition');
    }
};
// protected $fillable = ['workcode', 'projectname','workname','department','typeofwork','proposalnumber','categoryofwork',
//'probablecompletiondate','projectphase' ,'workdone','subtype','ip_address'];