<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WaterQualityController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('water-quality', WaterQualityController::class);

Route::get('/map', [MapController::class, 'index'])->name('map');
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

Route::resource('reports', ReportController::class);