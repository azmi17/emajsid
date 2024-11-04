<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use Carbon\Carbon;

class AdminJadwalController extends Controller
{
        public function create(Request $request)
    {
        return view('admin.jadwal_khutbah_create');
    }

    // Menyimpan jadwal khutbah baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => [
                'required',
                'date',
                'after_or_equal:today', // Tanggal tidak boleh kurang dari hari ini
                'required_if:hari,Jumat' // Tanggal harus hari Jumat
            ],
            'judul' => 'required',
            'ustadz' => 'required',
        ]);
        // $validatedData = $request->validate([
        //     'judul' => 'required',
        //     'tanggal' => 'required',
        //     'ustadz' => 'required',
        // ]);

        $jadwal = new Jadwal();

        $jadwal->judul = $request->input('judul');
        $jadwal->ustadz = $request->input('ustadz');
        $jadwal->tanggal = $request->input('tanggal');
        $jadwal->save();

        return redirect()->route('admin_jadwal_khutbah_show')->with('success', 'Jadwal khutbah telah berhasil ditambahkan.');
    }

    // Menampilkan detail jadwal khutbah
    public function show()
    {
        $jadwal = Jadwal::get();
        return view('admin.jadwal_khutbah', compact('jadwal'));
    }

    // Menampilkan formulir untuk mengedit jadwal khutbah
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.jadwal_khutbah_edit', ['jadwal' => $jadwal]);
    }

    // Memperbarui jadwal khutbah
    public function update(Request $request, $id)
    {

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->judul = $request->input('judul');
        $jadwal->ustadz = $request->input('ustadz');
        $jadwal->tanggal = $request->input('tanggal');
        $jadwal->update();

        return redirect()->route('admin_jadwal_khutbah_show')->with('success', 'Jadwal khutbah telah berhasil diperbarui.');
    }

    // Menghapus jadwal khutbah
    public function delete($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin_jadwal_khutbah_show')->with('success', 'Jadwal khutbah telah berhasil dihapus.');
    }
}
