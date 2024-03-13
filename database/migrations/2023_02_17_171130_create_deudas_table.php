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
        Schema::create('deudas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_deuda');
            $table->string('concepto');
            $table->double('valor', 10 , 2);
            $table->tinyInteger('pagado');
            $table->datetime('fecha_pago');
            $table->string('valor_abono');
            $table->string('info_abono');
            $table->datetime('fecha_abono');
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
        Schema::dropIfExists('deudas');
    }
};
