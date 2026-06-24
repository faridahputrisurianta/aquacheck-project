<?php

namespace App\Http\Controllers;

use App\Models\WaterQuality;
use Illuminate\Http\Request;

class WaterQualityController extends Controller
{
    public function index()
    {
        $data = WaterQuality::latest()->get();
        return view('water_quality.index', compact('data'));
    }

    public function create()
    {
        return view('water_quality.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi' => 'required',
            'ph' => 'required|numeric|min:0|max:14',
            'suhu' => 'required|numeric',
            'turbidity' => 'required|numeric',
            'tds' => 'required|numeric',
            'do_level' => 'required|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'tanggal' => 'required'
        ]);

        $status = $this->hitungStatus(
            $request->ph,
            $request->tds,
            $request->do_level
        );

        WaterQuality::create([
            'lokasi' => $request->lokasi,
            'ph' => $request->ph,
            'suhu' => $request->suhu,
            'turbidity' => $request->turbidity,
            'tds' => $request->tds,
            'do_level' => $request->do_level,
            'status' => $status,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('water-quality.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = WaterQuality::findOrFail($id);
        return view('water_quality.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = WaterQuality::findOrFail($id);

        $request->validate([
            'lokasi' => 'required',
            'ph' => 'required|numeric|min:0|max:14',
            'suhu' => 'required|numeric',
            'turbidity' => 'required|numeric',
            'tds' => 'required|numeric',
            'do_level' => 'required|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'tanggal' => 'nullable'
        ]);

        $status = $this->hitungStatus(
            $request->ph,
            $request->tds,
            $request->do_level
        );

        $data->update([
            'lokasi' => $request->lokasi,
            'ph' => $request->ph,
            'suhu' => $request->suhu,
            'turbidity' => $request->turbidity,
            'tds' => $request->tds,
            'do_level' => $request->do_level,
            'status' => $status,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'tanggal' => $request->tanggal ?? $data->tanggal,
        ]);

        return redirect()->route('water-quality.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = WaterQuality::findOrFail($id);
        $data->delete();

        return redirect()->route('water-quality.index')
            ->with('success', 'Data berhasil dihapus');
    }

    private function hitungStatus($ph, $tds, $do)
    {
        $status = 'Baik';

        if ($ph < 6 || $ph > 8 || $tds > 500 || $do < 4) {
            $status = 'Tercemar';
        } elseif (
            ($ph >= 6 && $ph <= 6.5) ||
            ($tds >= 300 && $tds <= 500) ||
            ($do >= 4 && $do <= 6)
        ) {
            $status = 'Perlu Perhatian';
        }

        return $status;
    }
}