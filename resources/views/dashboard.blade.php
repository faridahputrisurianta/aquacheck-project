@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<style>
    .cards{
        display:flex;
        gap:20px;
        flex-wrap:wrap;
        margin-top:20px;
    }

.dashboard-card{
    background:white;
    flex:1;
    min-width:250px;
    padding:20px;
    border-radius:15px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

    .dashboard-card h3{
        color:#555;
        margin-bottom:10px;
    }

    .dashboard-card h1{
        color:#1976d2;
        font-size:40px;
    }

    .box{
        margin-top:30px;
        background:white;
        padding:20px;
        border-radius:15px;
        box-shadow:0 3px 10px rgba(0,0,0,.1);
    }

    .status-good{
        color:green;
        font-weight:bold;
    }

    .status-warning{
        color:orange;
        font-weight:bold;
    }

    .status-danger{
        color:red;
        font-weight:bold;
    }

    #map{
        height:500px;
        width:100%;
        border-radius:15px;
    }
</style>

<h1>Dashboard Monitoring Kualitas Air</h1>

<div class="cards">
    <div class="dashboard-card">
        <h3>Total Pengukuran</h3>
        <h1>{{ $waterCount }}</h1>
    </div>

    <div class="dashboard-card">
        <h3>Total Laporan</h3>
        <h1>{{ $reportCount }}</h1>
    </div>

    <div class="dashboard-card">
        <h3>Total Notifikasi</h3>
        <h1>{{ $notifCount }}</h1>
    </div>
</div>

@if($latest)
<div class="box">
    <h2>Data Air Terbaru</h2>
    <br>

    <p><b>Lokasi:</b> {{ $latest->lokasi }}</p>
    <p><b>pH:</b> {{ $latest->ph }}</p>
    <p><b>Suhu:</b> {{ $latest->suhu }} °C</p>
    <p><b>Turbidity:</b> {{ $latest->turbidity }}</p>
    <p><b>TDS:</b> {{ $latest->tds }}</p>
    <p><b>DO:</b> {{ $latest->do_level }}</p>

    <p>
        <b>Status:</b>

        @if($latest->status == 'Baik')
            <span class="status-good">🟢 Baik</span>
        @elseif($latest->status == 'Perlu Perhatian')
            <span class="status-warning">🟡 Perlu Perhatian</span>
        @else
            <span class="status-danger">🔴 Tercemar</span>
        @endif
    </p>
</div>
@endif

<div class="box">
    <h2>Grafik pH Air</h2>
    <br>
    <canvas id="chart"></canvas>
</div>

<div class="box">
    <h2>Peta Lokasi Monitoring</h2>
    <br>
    <div id="map"></div>
</div>

<script>
const ctx = document.getElementById('chart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
            @foreach($chartData as $item)
                "{{ $item->lokasi }}",
            @endforeach
        ],
        datasets: [{
            label: 'pH Air',
            data: [
                @foreach($chartData as $item)
                    {{ $item->ph }},
                @endforeach
            ],
            borderWidth: 2,
            tension: 0.3
        }]
    }
});
</script>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
var map = L.map('map').setView([5.5483, 95.3238], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19
}).addTo(map);

@foreach($locations as $loc)

    @php
        $color = 'green';

        if($loc->status == 'Perlu Perhatian'){
            $color = 'orange';
        }

        if($loc->status == 'Tercemar'){
            $color = 'red';
        }
    @endphp

    L.circleMarker([{{ $loc->latitude }}, {{ $loc->longitude }}], {
        radius: 10,
        color: "{{ $color }}",
        fillColor: "{{ $color }}",
        fillOpacity: 0.8
    }).addTo(map)
    .bindPopup(`
        <b>Lokasi:</b> {{ $loc->lokasi }} <br>
        <b>Status:</b> {{ $loc->status }} <br>
        <b>pH:</b> {{ $loc->ph }} <br>
        <b>TDS:</b> {{ $loc->tds }}
    `);

@endforeach
</script>

@endsection