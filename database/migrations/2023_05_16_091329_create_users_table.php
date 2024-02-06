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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('id_r_sekolah')->nullable();
            $table->unsignedBigInteger('id_r_provinsi')->nullable();
            $table->unsignedBigInteger('id_r_kabupaten')->nullable();
            $table->unsignedBigInteger('id_r_kecamatan')->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('nama');
            $table->string('email');
            $table->string('no_whatsapp');
            $table->string('alamat');
            $table->string('nama_pengguna');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_r_sekolah')->references('id')->on('sekolah');
            $table->foreign('id_r_provinsi')->references('id')->on('provinsi');
            $table->foreign('id_r_kabupaten')->references('id')->on('kabupaten');
            $table->foreign('id_r_kecamatan')->references('id')->on('kecamatan');
            $table->boolean('is_blocked')->default(false);
            $table->string('recovery_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
