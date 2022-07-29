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
        Schema::create('datagames', function (Blueprint $table) {
            $table->id();
            $table->string('nick_name');
            $table->integer('ID_game');
            $table->unsignedBigInteger('id_daftar');
            $table->foreign('id_daftar')->references('id')->on('daftars')->onDelete('cascade');
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
        Schema::dropIfExists('datagames');
    }
};
