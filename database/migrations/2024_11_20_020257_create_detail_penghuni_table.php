<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenghuniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penghuni', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('penghuni_id');
            $table->string('nama',100);
            $table->string('alamat',100);
            $table->date('tgllhr');
            $table->string('telp',12);
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
        Schema::dropIfExists('detail_penghuni');
    }
}
