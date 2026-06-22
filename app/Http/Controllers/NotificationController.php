<?php

namespace App\Http\Controllers;

use App\Models\WaterQuality;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = WaterQuality::where('status', 'Tercemar')
                        ->orderBy('id', 'desc')
                        ->get();

        $totalNotif = $notifications->count();

        return view('notifications.index', compact('notifications', 'totalNotif'));
    }
}