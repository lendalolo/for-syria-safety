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
        Schema::create('organization_compaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained('organizations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('compaign_id')->constrained('compaigns')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('financing_value');
            $table->string('Budget');
            $table->string('current_covered_areas');
            $table->string('covered_areas');
            $table->string('amount_paid');
            $table->string('materials_num');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_compaigns');
    }
};