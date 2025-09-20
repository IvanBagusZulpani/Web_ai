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
         Schema::create('meteran', function (Blueprint $table) {
            $table->id();
            $table->string('device_id', 50)->nullable(); // ID alat ESP
            $table->string('reading_value')->nullable(); // angka hasil OCR (misalnya "12345")
            //$table->string('image_path')->nullable();    // lokasi gambar (opsional, kalau mau simpan)
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
        Schema::dropIfExists('meteran');
    }
};
