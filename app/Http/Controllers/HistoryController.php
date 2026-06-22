<?php

namespace App\Http\Controllers;

use App\Models\WaterQuality;

class HistoryController extends Controller
{
    public function index()
    {
        $data = WaterQuality::orderBy('id', 'desc')->get();

        return view('history.index', compact('data'));
    }
}