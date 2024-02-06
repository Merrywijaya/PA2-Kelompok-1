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
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_m_pertanyaan')->nullable();
            $table->unsignedBigInteger('id_m_pengguna')->nullable();
            $table->longtext('teks')->nullable();
            $table->boolean('pinned')->default(false);
            $table->integer('vote_up')->default(0);
            $table->integer('vote_down')->default(0);
            $table->string('user_vote')->nullable();
            $table->timestamps();

            $table->foreign('id_m_pertanyaan')->references('id')->on('pertanyaan');
            $table->foreign('id_m_pengguna')->references('id')->on('users');
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
