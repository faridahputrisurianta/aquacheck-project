@extends('layouts.app')

@section('content')

<h1 style="font-size:50px; margin-bottom:20px;">Data Monitoring Air</h1>

<a href="{{ route('water-quality.create') }}" class="btn btn-primary">
    + Tambah Data
</a>

<br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Lokasi</th>
        <th>pH</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($data as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->lokasi }}</td>
        <td>{{ $item->ph }}</td>

        <td>
            @if($item->status == 'Baik')
                <span class="badge-good">🟢 Baik</span>
            @elseif($item->status == 'Perlu Perhatian')
                <span class="badge-warning">🟡 Perlu Perhatian</span>
            @else
                <span class="badge-danger">🔴 Tercemar</span>
            @endif
        </td>

        <td>
            <a href="{{ route('water-quality.edit', $item->id) }}"
               class="btn btn-warning">
                Edit
            </a>

            <form action="{{ route('water-quality.destroy', $item->id) }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection