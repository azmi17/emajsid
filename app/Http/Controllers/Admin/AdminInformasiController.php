<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;
use Illuminate\Support\Facades\DB;

class AdminInformasiController extends Controller
{
    public function create(Request $request)
    {
        return view('admin.kas_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama_transaksi' => 'required',
            'jenis_transaksi' => 'required',
            'dana' => 'required|numeric', // Menambahkan validasi numeric
        ]);

        $informasi = new Informasi();

        $informasi->tanggal = $request->input('tanggal');
        $informasi->nama_transaksi = $request->input('nama_transaksi');
        $informasi->jenis_transaksi = $request->input('jenis_transaksi');
        $informasi->dana = $request->input('dana');
        $informasi->jumlah = $request->input('dana');
        $informasi->save();

        return redirect()->route('admin_kas_show')->with('success', 'Jadwal khutbah telah berhasil ditambahkan.');
    }

    public function show()
    {
        $informasi = Informasi::get();

        $total_pemasukan = Informasi::where('jenis_transaksi', 'pemasukan')
            ->sum('dana');
        $total_pengeluaran = Informasi::where('jenis_transaksi', 'pengeluaran')
            ->sum('dana');
        $total = intval($total_pemasukan) - intval($total_pengeluaran);

        $total_pemasukan = 'Rp ' . number_format($total_pemasukan, 2, ',', '.');
        $total_pengeluaran = 'Rp ' . number_format($total_pengeluaran, 2, ',', '.');

        $total = 'Rp ' . number_format($total, 2, ',', '.   ');

        return view('admin.kas_show', compact('informasi', 'total', 'total_pemasukan', 'total_pengeluaran'));
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.kas_edit', ['informasi' => $informasi]);
    }

    public function update(Request $request, $id)
    {

        $informasi = Informasi::findOrFail($id);
        $informasi->tanggal = $request->input('tanggal');
        $informasi->nama_transaksi = $request->input('nama_transaksi');
        $informasi->jenis_transaksi = $request->input('jenis_transaksi');
        $informasi->dana = $request->input('dana');
        $informasi->jumlah = $request->input('dana');
        $informasi->update();

        return redirect()->route('admin_kas_show')->with('success', 'Kas telah berhasil diperbarui.');
    }

    public function delete($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();

        return redirect()->route('admin_kas_show')->with('success', 'Kas telah berhasil dihapus.');
    } 
}
