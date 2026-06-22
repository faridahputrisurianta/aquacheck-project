<?php

namespace App\Http\Controllers;

use App\Models\WaterQuality;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $locations = WaterQuality::all();

        return view('map.index', compact('locations'));
    }
}