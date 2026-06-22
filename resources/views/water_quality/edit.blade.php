@extends('layouts.app')

@section('content')

<div class="card">
    <h1>Edit Data Air</h1>

    <form action="{{ route('water-quality.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="lokasi" value="{{ $data->lokasi }}" required>
        <input type="number" step="0.01" name="ph" value="{{ $data->ph }}" required>
        <input type="number" step="0.01" name="suhu" value="{{ $data->suhu }}" required>
        <input type="number" step="0.01" name="turbidity" value="{{ $data->turbidity }}" required>
        <input type="number" step="0.01" name="tds" value="{{ $data->tds }}" required>
        <input type="number" step="0.01" name="do_level" value="{{ $data->do_level }}" required>
        <input type="number" step="any" name="latitude" value="{{ $data->latitude }}" required>
        <input type="number" step="any" name="longitude" value="{{ $data->longitude }}" required>
        <input type="datetime-local" name="tanggal">

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection