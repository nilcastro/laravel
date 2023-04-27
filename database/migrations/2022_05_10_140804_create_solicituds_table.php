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
            $table->integer('observAsistente')->nullable();
            $table->string('autoriza')->nullable();
            $table->string('nombreauto')->nullable();
            $table->string('jefeautori')->nullable();
            $table->string('centrocosto');
            $table->string('ids')->NULL();
            $table->string('observCentrocosto')->nullable();
            $table->string('correoautori')->nullable();
            $table->string('unidadAutori');
            $table->string('username')->nullable();
            $table->string('nombresolici')->nullable();
            $table->string('recoge')->nullable();
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
            $table->integer('persrecibe')->nullable();
            $table->string('mas')->nullable();
            $table->integer('telefrecibe')->nullable();
            $table->integer('observacion')->nullable();
            $table->string('fechasolicidos')->nullable();
            $table->string('horados')->nullable();
            $table->string('lugardos')->nullable();
            $table->string('productodos')->nullable();
            $table->integer('cantidaddos')->nullable();
            $table->integer('valoruniddos')->nullable();
            $table->integer('valortotados')->nullable();
            $table->string('persrecibedos')->nullable();
            $table->string('fechasolicitres')->nullable();
            $table->string('horatres')->nullable();
            $table->string('lugartres')->nullable();
            $table->string('persrecibetres')->nullable();
            $table->string('productotres')->nullable();
            $table->string('cantidatres')->nullable();
            $table->string('valorunidtres')->nullable();
            $table->string('valortotatres')->nullable();
            $table->string('fechasolicicuatro')->nullable();
            $table->string('horacuatro')->nullable();
            $table->string('lugarcuatro')->nullable();
            $table->string('persrecibecuatro')->nullable();
            $table->string('productocuatro')->nullable();
            $table->string('cantidadcuatro')->nullable();
            $table->string('valorunidcuatro')->nullable();
            $table->string('valortotacuatro')->nullable();
            $table->string('fechasolicicinco')->nullable();
            $table->string('horacinco')->nullable();
            $table->string('lugarcinco')->nullable();
            $table->string('persrecibecinco')->nullable();
            $table->string('productocinco')->nullable();
            $table->string('cantidadcinco')->nullable();
            $table->string('valorunidcinco')->nullable();
            $table->string('valortotacinco')->nullable();
            $table->string('valortotalfinal')->nullable();
            $table->string('correoautorizadores')->nullable();
            $table->string('profesional')->nullable();
            $table->string('email_jefe')->nullable();
            $table->string('estado')->nullable();
            $table->string('jefe')->nullable();
            $table->string('email')->nullable();
            $table->string('observacionincomplet')->nullable();
            $table->string('jefenombre')->nullable();
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
