<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('water_qualities', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi');
            $table->float('ph');
            $table->float('suhu');
            $table->float('turbidity');
            $table->float('tds');
            $table->float('do_level');
            $table->enum('status', ['Baik', 'Perlu Perhatian', 'Tercemar']);
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamp('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_qualities');
    }
};