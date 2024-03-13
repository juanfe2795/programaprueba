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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->tinyInteger('tipo_documento');
            $table->string('cedula', 12)->unique();
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->string('img_user', 100);
            $table->rememberToken();
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
            $table->smallInteger('estado');
            $table->smallInteger('borrado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
