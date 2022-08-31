<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cons_codigo');
            $table->string('data');
            $table->string('hora');
            $table->boolean('particular');
            $table->string('cons_med');
            $table->string('cons_proc');
            $table->string('cons_pac');

            $table->foreign('cons_med')->references('med_codigo')->on('medicos');
            $table->foreign('cons_proc')->references('proc_codigo')->on('procedimentos');
            $table->foreign('cons_pac')->references('pac_codigo')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
