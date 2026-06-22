<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterQuality extends Model
{
    protected $fillable = [
        'lokasi',
        'ph',
        'suhu',
        'turbidity',
        'tds',
        'do_level',
        'status',
        'latitude',
        'longitude',
        'tanggal'
    ];
}