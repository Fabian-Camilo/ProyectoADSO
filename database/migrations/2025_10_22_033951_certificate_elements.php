<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CertificateElements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_elements', function (Blueprint $table) {
            $table->id();

            // Relación con el certificado
            $table->foreignId('certificate_id')->references('id')->on('certificates')->onDelete('cascade');
            // Atributos del elemento
            $table->string('name');
            $table->string('type')->nullable(); // Ej: text, number, date, etc.
            $table->text('value')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificate_elements');
    }
}
