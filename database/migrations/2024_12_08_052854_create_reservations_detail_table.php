<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations_detail', function (Blueprint $table) {
            $table->id();  // Primary key untuk reservations_detail
            $table->foreignId('reservation_id')->constrained('reservations')->onDelete('cascade'); // Menghubungkan ke tabel reservations
            $table->foreignId('penghuni_detail_id')->constrained('detail_penghuni')->onDelete('cascade'); // Menghubungkan ke tabel detail_penghuni
            $table->timestamps();  // Kolom created_at dan updated_at
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations_detail');
    }
}
