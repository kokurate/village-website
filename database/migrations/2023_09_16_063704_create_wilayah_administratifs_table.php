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
        Schema::create('wilayah_administratifs', function (Blueprint $table) {
            $table->id();
            $table->integer('data_desa_id')->nullable();
            $table->string('dusun')->nullable();
            $table->integer('kk')->nullable();
            $table->integer('laki_laki')->nullable();
            $table->integer('perempuan')->nullable();
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
        Schema::dropIfExists('wilayah_administratifs');
    }
};
