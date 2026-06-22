<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WaterQuality;

class WaterQualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WaterQuality::create([
            'lokasi' => 'Sungai Krueng',
            'ph' => 7.1,
            'suhu' => 28,
            'turbidity' => 4,
            'tds' => 220,
            'do_level' => 7,
            'status' => 'Baik',
            'latitude' => 5.5483,
            'longitude' => 95.3238,
            'tanggal' => now()
        ]);
    }
}