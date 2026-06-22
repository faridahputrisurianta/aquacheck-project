<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'jenis_laporan',
        'deskripsi',
        'foto',
        'latitude',
        'longitude'
    ];
}