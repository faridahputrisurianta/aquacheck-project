@extends('layouts.app')

@section('content')

<style>
    .form-card{
        background:white;
        padding:30px;
        border-radius:20px;
        box-shadow:0 5px 15px rgba(0,0,0,0.1);
    }

    .grid{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:20px;
    }

    .form-group{
        display:flex;
        flex-direction:column;
    }

    .form-group label{
        font-weight:bold;
        margin-bottom:8px;
    }

    .form-control{
        padding:14px;
        border:1px solid #ccc;
        border-radius:12px;
        font-size:16px;
    }

    .btn-save{
        margin-top:20px;
        padding:15px 30px;
        background:#2563eb;
        color:white;
        border:none;
        border-radius:12px;
        font-weight:bold;
        cursor:pointer;
    }
</style>

<div class="form-card">
    <h1>Edit Data Air</h1>
    <br>

    <form action="{{ route('water-quality.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid">

            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ $data->lokasi }}" required>
            </div>

            <div class="form-group">
                <label>pH</label>
                <input type="number" step="0.01" name="ph" class="form-control" value="{{ $data->ph }}" required>
            </div>

            <div class="form-group">
                <label>Suhu</label>
                <input type="number" step="0.01" name="suhu" class="form-control" value="{{ $data->suhu }}" required>
            </div>

            <div class="form-group">
                <label>Turbidity</label>
                <input type="number" step="0.01" name="turbidity" class="form-control" value="{{ $data->turbidity }}" required>
            </div>

            <div class="form-group">
                <label>TDS</label>
                <input type="number" step="0.01" name="tds" class="form-control" value="{{ $data->tds }}" required>
            </div>

            <div class="form-group">
                <label>DO Level</label>
                <input type="number" step="0.01" name="do_level" class="form-control" value="{{ $data->do_level }}" required>
            </div>

            <div class="form-group">
                <label>Latitude</label>
                <input type="number" step="any" name="latitude" class="form-control" value="{{ $data->latitude }}" required>
            </div>

            <div class="form-group">
                <label>Longitude</label>
                <input type="number" step="any" name="longitude" class="form-control" value="{{ $data->longitude }}" required>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input 
                    type="datetime-local"
                    name="tanggal"
                    class="form-control"
                    value="{{ \Carbon\Carbon::parse($data->tanggal)->format('Y-m-d\TH:i') }}"
                    required
                >
            </div>

        </div>

        <button type="submit" class="btn-save">
            Update Data
        </button>
    </form>
</div>

@endsection