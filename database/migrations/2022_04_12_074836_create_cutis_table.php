<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users');
            $table->string('nip');
            $table->string('jenis_cuti');
            $table->string('tanggal_mulai');
            $table->string('tanggal_selesai');
            $table->string('keterangan');
            $table->string('bukti_cuti');
            $table->integer('id_status');
            $table->integer('id_approval_manager');
            $table->integer('id_approval_senior_manager');
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
        Schema::dropIfExists('cutis');
    }
}
