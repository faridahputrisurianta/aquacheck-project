@extends('layouts.app')

@section('content')

<h1 style="font-size:45px;margin-bottom:20px;">
    Laporan Masyarakat
</h1>

<a href="{{ route('reports.create') }}" class="btn btn-primary">
    + Tambah Laporan
</a>

<br><br>

<table>
    <tr>
        <th>Jenis Laporan</th>
        <th>Deskripsi</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Foto</th>
    </tr>

    @forelse($reports as $report)
    <tr>
        <td>{{ $report->jenis_laporan }}</td>
        <td>{{ $report->deskripsi }}</td>
        <td>{{ $report->latitude }}</td>
        <td>{{ $report->longitude }}</td>
        <td>
            @if($report->foto)
                <img src="{{ asset('storage/'.$report->foto) }}" width="100">
            @else
                Tidak ada foto
            @endif
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5" style="text-align:center;">
            Belum ada laporan
        </td>
    </tr>
    @endforelse
</table>

@endsection