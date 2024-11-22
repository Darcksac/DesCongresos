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
        Schema::create('ponentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_ponente');
            $table->string('origen_ponente');
            $table->text('curriculum');
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponentes');
    }
};
