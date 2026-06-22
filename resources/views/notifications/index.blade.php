@extends('layouts.app')

@section('content')

<style>
    .notif-title{
        font-size:40px;
        font-weight:bold;
        margin-bottom:20px;
        color:#111827;
    }

    .notif-count{
        background:#ef4444;
        color:white;
        display:inline-block;
        padding:10px 18px;
        border-radius:30px;
        margin-bottom:25px;
        font-weight:bold;
    }

    .notif-card{
        background:#fee2e2;
        border-left:8px solid red;
        padding:20px;
        border-radius:12px;
        margin-bottom:20px;
        box-shadow:0 3px 10px rgba(0,0,0,.08);
    }

    .safe-card{
        background:#dcfce7;
        border-left:8px solid green;
        padding:20px;
        border-radius:12px;
    }
</style>

<h1 class="notif-title">Notifikasi Peringatan</h1>

<div class="notif-count">
    Total Notifikasi: {{ $totalNotif }}
</div>

@if($totalNotif > 0)

    @foreach($notifications as $notif)
        <div class="notif-card">
            <h2>⚠️ Peringatan Air Tercemar</h2>
            <br>

            <p><b>Lokasi:</b> {{ $notif->lokasi }}</p>
            <p><b>Tanggal:</b> {{ $notif->tanggal }}</p>
            <p><b>pH:</b> {{ $notif->ph }}</p>
            <p><b>TDS:</b> {{ $notif->tds }}</p>
            <p><b>DO:</b> {{ $notif->do_level }}</p>
            <p><b>Status:</b> 🔴 {{ $notif->status }}</p>
        </div>
    @endforeach

@else

    <div class="safe-card">
        <h2>✅ Tidak Ada Peringatan</h2>
        <p>Semua kualitas air masih dalam kondisi aman.</p>
    </div>

@endif

@endsection