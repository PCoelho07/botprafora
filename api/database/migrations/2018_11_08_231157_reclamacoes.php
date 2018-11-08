<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reclamacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 300);

            $table->integer('reclamante')->unsigned();
            $table->integer('reclamado')->unsigned();
            $table->timestamps();


            $table->foreign('reclamante')
                    ->references('id')
                    ->on('conjuge');

            $table->foreign('reclamado')
                    ->references('id')
                    ->on('conjuge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reclamacoes', function (Blueprint $table) {
            $table->dropForeign(['reclamante', 'reclamado']);
        });

        Schema::dropIfExists('reclamacoes');
    }
}
