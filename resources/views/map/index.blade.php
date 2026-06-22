@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>
    .map-card{
        background:white;
        padding:20px;
        border-radius:15px;
        box-shadow:0 3px 10px rgba(0,0,0,.1);
    }

    #map{
        width:100%;
        height:650px;
        border-radius:15px;
    }

    .legend{
        display:flex;
        gap:20px;
        margin-bottom:20px;
        font-weight:bold;
    }
</style>

<h1>Peta Lokasi Monitoring Air</h1>
<br>

<div class="map-card">

    <div class="legend">
        <span style="color:green;">🟢 Baik</span>
        <span style="color:orange;">🟡 Perlu Perhatian</span>
        <span style="color:red;">🔴 Tercemar</span>
    </div>

    <div id="map"></div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    var map = L.map('map').setView([5.5483, 95.3238], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    var bounds = [];

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

        var lat = Number("{{ $loc->latitude }}");
        var lng = Number("{{ $loc->longitude }}");

        console.log("Marker:", "{{ $loc->lokasi }}", lat, lng);

        if(
            !isNaN(lat) &&
            !isNaN(lng) &&
            lat >= -90 &&
            lat <= 90 &&
            lng >= -180 &&
            lng <= 180
        ){
            var marker = L.circleMarker([lat, lng], {
                radius: 12,
                color: "{{ $color }}",
                fillColor: "{{ $color }}",
                fillOpacity: 0.8,
                weight: 3
            }).addTo(map);

            marker.bindPopup(`
                <h3>{{ $loc->lokasi }}</h3>
                <hr>
                <b>pH:</b> {{ $loc->ph }} <br>
                <b>Suhu:</b> {{ $loc->suhu }} °C <br>
                <b>Turbidity:</b> {{ $loc->turbidity }} <br>
                <b>TDS:</b> {{ $loc->tds }} <br>
                <b>DO:</b> {{ $loc->do_level }} <br>
                <b>Status:</b> {{ $loc->status }} <br>
                <b>Tanggal:</b> {{ $loc->tanggal }}
            `);

            bounds.push([lat, lng]);
        }

    @endforeach

    if(bounds.length > 0){
        map.fitBounds(bounds, {
            padding:[50,50]
        });
    }

});
</script>

@endsection