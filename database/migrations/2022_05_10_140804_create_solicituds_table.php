<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->date('dia')->nullable();
            $table->string('description')->nullable();
            $table->integer('duracion')->nullable();
            $table->date('fechain')->nullable();
            $table->date('fechafi')->nullable();
            $table->integer('asistente')->nullable();
            $table->string('autoriza')->nullable();
            $table->string('nombreauto')->nullable();
            $table->string('jefeautori')->nullable();
            $table->string('centrocosto')->nullable();
            $table->string('correoautori')->nullable();
            $table->string('nombresolici')->nullable();
            $table->string('recibe')->nullable();
            $table->string('Nombreprove')->nullable();
            $table->string('Correoelectroni')->nullable();
            $table->string('Teléfono')->nullable();
            $table->string('nombrecontactouno')->nullable();
            $table->string('telefonouno')->nullable();
            $table->string('nombrecontactodos')->nullable();
            $table->string('telefonodos')->nullable();
            $table->string('fechasoliciuno')->nullable();
            $table->string('horauno')->nullable();
            $table->string('lugaruno')->nullable();
            $table->string('producto')->nullable();
            $table->integer('cantidad')->nullable();
            $table->integer('valorunid')->nullable();
            $table->integer('valortota')->nullable();
            $table->string('estado')->nullable();
          
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
        Schema::dropIfExists('solicituds');
    }
};
