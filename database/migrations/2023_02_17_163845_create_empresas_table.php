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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa');
            $table->datetime('fecha_inicio_contrato');
            $table->datetime('fecha_fin_contrato');
            $table->double('valor_contrato', 10 , 2);
            $table->double('pago_mensual', 10 , 2);
            $table->timestamps();
            $table->tinyInteger('borrado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
