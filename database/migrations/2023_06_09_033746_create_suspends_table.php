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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_suspended')->default(false);
            $table->timestamp('suspend_start_time')->nullable();
            $table->integer('suspend_duration')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_suspended');
            $table->dropColumn('suspend_start_time');
            $table->dropColumn('suspend_duration');
        });
    }
};
