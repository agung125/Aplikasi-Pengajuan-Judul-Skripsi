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
        Schema::create('dps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mahasiswa_id')->unsigned();
            $table->string('judul_skripsi');
            $table->bigInteger('dosen1')->unsigned();
            $table->bigInteger('dosen2')->unsigned();
            $table->bigInteger('dosen3')->unsigned();
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
        Schema::dropIfExists('dps');
    }
};
