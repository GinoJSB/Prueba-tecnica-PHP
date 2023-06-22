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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('DOC_NOMBRE', 60);
            $table->string('DOC_CODIGO', 20);
            $table->text('DOC_CONTENIDO');
            $table->unsignedBigInteger('DOC_ID_TIPO');
            $table->unsignedBigInteger('DOC_ID_PROCESO');
            $table->foreign('DOC_ID_TIPO')->references('id')->on('tipo');
            $table->foreign('DOC_ID_PROCESO')->references('id')->on('proceso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
