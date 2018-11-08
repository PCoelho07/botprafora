<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConjugeFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conjuge', function (Blueprint $table) {
            $table->integer('parceiro_id')->unsigned();

            $table->foreign('parceiro_id')
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
        Schema::table('conjuge', function (Blueprint $table) {
            $table->dropForeign(['parceiro_id']);
        });
    }
}
