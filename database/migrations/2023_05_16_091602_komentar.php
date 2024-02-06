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
        Schema::create('komentar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_m_pengguna');
            $table->unsignedBigInteger('id_m_jawaban');
            $table->text('teks');
            $table->boolean('pinned')->default(false);
            $table->timestamps();

            $table->foreign('id_m_pengguna')->references('id')->on('users');
            $table->foreign('id_m_jawaban')->references('id')->on('jawaban');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
