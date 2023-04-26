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
        Schema::table('projects', function (Blueprint $table) {
            // 1. aggiungo la colonna
            $table->unsignedBigInteger('type_id')->nullable()->afetr('id');

            //2. creo la relazione tra la chiave esterna(type_id) e la chiave primaria(id)

            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // qui dobbiamo fare le azioni inverse rispetto all'up,quindi droppo la relazione

            $table->dropForeign(['type_id']);

            // droppo la colonna 

            $table->dropColumn('type_id');
        });
    }
};
