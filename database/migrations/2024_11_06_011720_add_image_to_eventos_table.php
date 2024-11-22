<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->string('imagen')->nullable()->after('lugar_evento'); // Ajusta 'lugar_evento' si deseas cambiar la posición
        });
    }
    
    public function down()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropColumn('imagen');
        });
    }
    
    
};
