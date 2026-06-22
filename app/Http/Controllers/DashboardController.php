<?php

namespace App\Http\Controllers;

use App\Models\WaterQuality;
use App\Models\Report;

class DashboardController extends Controller
{
    public function index()
    {
        // Data terbaru
        $latest = WaterQuality::orderBy('id', 'desc')->first();

        // Statistik
        $waterCount = WaterQuality::count();
        $reportCount = Report::count();

        // Hitung notifikasi dari data air yang tidak Baik
        $notifCount = WaterQuality::where('status', '!=', 'Baik')->count();

        // Data chart
        $chartData = WaterQuality::orderBy('id', 'asc')->get();

        // Lokasi map
        $locations = WaterQuality::all();

        return view('dashboard', compact(
            'latest',
            'waterCount',
            'reportCount',
            'notifCount',
            'chartData',
            'locations'
        ));
    }
}