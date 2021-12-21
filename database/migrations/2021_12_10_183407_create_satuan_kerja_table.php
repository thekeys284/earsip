<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatuanKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satuan_kerja', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_satker');
            $table->string('nama_satker');
            $table->string('email');
            $table->string('alternatif_email');
            $table->integer('no_telepon');
            $table->string('alamat_kantor');
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
        Schema::dropIfExists('satuan_kerja');
    }
}
