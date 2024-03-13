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
        Schema::create('ahorros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_ahorro');
            $table->string('concepto');
            $table->double('valor', 10 , 2);
            $table->unsignedBigInteger('ingresos_id');
            $table->foreign('ingresos_id')->references('id')->on('ingresos');
            $table->timestamps();
            $table->tinyInteger('borrado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ahorros');
    }
};
