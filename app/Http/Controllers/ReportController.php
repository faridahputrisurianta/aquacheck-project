<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::latest()->get();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_laporan' => 'required',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('reports', 'public');
        }

        Report::create([
            'nama' => $request->nama ?? 'Anonim',
            'jenis_laporan' => $request->jenis_laporan,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('reports.index')
            ->with('success', 'Laporan berhasil ditambahkan');
    }
}