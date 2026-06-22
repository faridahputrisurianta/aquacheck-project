@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .history-title{
        font-size:40px;
        font-weight:bold;
        color:#111827;
        margin-bottom:20px;
    }

    .history-card{
        background:white;
        padding:20px;
        border-radius:15px;
        box-shadow:0 3px 10px rgba(0,0,0,.1);
        margin-bottom:30px;
    }

    .chart-wrapper{
        height:400px;
        position:relative;
    }

    #historyChart{
        width:100% !important;
        height:100% !important;
    }

    .badge-good{
        background:green;
        color:white;
        padding:6px 12px;
        border-radius:20px;
    }

    .badge-warning{
        background:orange;
        color:white;
        padding:6px 12px;
        border-radius:20px;
    }

    .badge-danger{
        background:red;
        color:white;
        padding:6px 12px;
        border-radius:20px;
    }
</style>

<h1 class="history-title">Riwayat Pengukuran Air</h1>

<div class="history-card">
    <div class="chart-wrapper">
        <canvas id="historyChart"></canvas>
    </div>
</div>

<div class="history-card">
    <table>
        <thead>
            <tr>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>pH</th>
                <th>Suhu</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->lokasi }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->ph }}</td>
                <td>{{ $item->suhu }} °C</td>
                <td>
                    @if($item->status == 'Baik')
                        <span class="badge-good">🟢 Baik</span>
                    @elseif($item->status == 'Perlu Perhatian')
                        <span class="badge-warning">🟡 Perlu Perhatian</span>
                    @else
                        <span class="badge-danger">🔴 Tercemar</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
const ctx = document.getElementById('historyChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
            @foreach($data as $item)
                "{{ $item->lokasi }}",
            @endforeach
        ],
        datasets: [{
            label: 'Tren pH Air',
            data: [
                @foreach($data as $item)
                    {{ $item->ph }},
                @endforeach
            ],
            borderWidth: 3,
            tension: 0.4
        }]
    },
    options:{
        responsive:true,
        maintainAspectRatio:false
    }
});
</script>

@endsection