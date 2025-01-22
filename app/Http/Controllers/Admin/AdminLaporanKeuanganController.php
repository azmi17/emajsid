<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanKeuangan;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

class AdminLaporanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = LaporanKeuangan::all();
        return view('admin.laporan_keuangan_index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.laporan_keuangan_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|string',
            'bulan' => 'required|string',
            'deskripsi' => 'required|string',
            'file_path' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file_path')) {
            $originalName = $request->file('file_path')->getClientOriginalName();
            $fileName =  date('d-m-Y') . '-' .  $originalName;
            $filePath = $request->file('file_path')->storeAs('documents', $fileName, 'public');
        }

        LaporanKeuangan::create([
            'tahun'     => $request->tahun,
            'bulan'     => $request->bulan,
            'deskripsi' => $request->deskripsi,
            'admin_id'  => Auth::guard('admin')->user()->id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('lapkeu.index')->with('success', 'Data is added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanKeuangan $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lapkeu = LaporanKeuangan::where('id', $id)
            ->where('admin_id', Auth::guard('admin')->user()->id)
            ->firstOrFail();

        return view('admin.laporan_keuangan_edit', compact('lapkeu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\LaporanKeuangan $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lapkeu = LaporanKeuangan::findOrFail($id);

        $request->validate([
            'tahun' => 'required|string',
            'bulan' => 'required|string',
            'deskripsi' => 'required|string',
            'file_path' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = $lapkeu->file_path;

        if ($request->hasFile('file_path')) {
            $originalName = $request->file('file_path')->getClientOriginalName();
            $fileName = date('d-m-Y') . '-' . $originalName;

            Storage::disk('public')->delete($lapkeu->file_path);

            $filePath = $request->file('file_path')->storeAs('documents', $fileName, 'public');
        }

        $lapkeu->update([
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'deskripsi' => $request->deskripsi,
            'admin_id' => Auth::guard('admin')->user()->id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('lapkeu.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanKeuangan $laporanKeuangan
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $lapkeu = LaporanKeuangan::where('id', $id)
            ->where('admin_id', Auth::guard('admin')->user()->id)
            ->firstOrFail();

        if ($lapkeu->file_path) {
            Storage::disk('public')->delete($lapkeu->file_path);
        }

        $lapkeu->delete();

        return redirect()->route('lapkeu.index')->with('success', 'Data deleted successfully.');
    }
}
