@extends('layouts.app')

@section('content')

<h1 style="font-size:40px; margin-bottom:20px;">
    Tambah Laporan
</h1>

<div class="card">
    <form action="{{ route('reports.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <label>Jenis Laporan</label>
        <br><br>

        <select name="jenis_laporan" required style="padding:10px; width:100%;">
            <option value="">-- Pilih Jenis Laporan --</option>
            <option>Air Berbau</option>
            <option>Air Berubah Warna</option>
            <option>Limbah Dibuang ke Sungai</option>
        </select>

        <br><br>

        <label>Deskripsi</label>
        <br><br>

        <textarea name="deskripsi"
                  style="width:100%;height:120px;padding:15px;"
                  required></textarea>

        <br><br>

        <label>Latitude</label>
        <br><br>

        <input type="text"
               name="latitude"
               required
               style="width:100%;padding:12px;">

        <br><br>

        <label>Longitude</label>
        <br><br>

        <input type="text"
               name="longitude"
               required
               style="width:100%;padding:12px;">

        <br><br>

        <label>Upload Foto</label>
        <br><br>

        <input type="file" name="foto">

        <br><br>

        <button class="btn btn-primary">
            Simpan Laporan
        </button>
    </form>
</div>

@endsection