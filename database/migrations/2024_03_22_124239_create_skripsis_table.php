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
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mahasiswa_id')->unsigned();
            $table->bigInteger('dosen_id')->unsigned();
            $table->string('judul_skripsi');
            $table->string('file');
            $table->string('invoice')->nullable();
            $table->unsignedBigInteger('user_approve_1_id')->nullable();
            $table->unsignedBigInteger('user_approve_2_id')->nullable();
            $table->foreign('user_approve_1_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('user_approve_2_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('skripsis');
    }
};
