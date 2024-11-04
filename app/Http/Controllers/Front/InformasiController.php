<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Language;
use App\Helper\Helpers;


class InformasiController extends Controller
{
    public function index()
    {
        Helpers::read_json();

        if(!session()->get('session_short_name')) {
            $current_short_name = Language::where('is_default','Yes')->first()->short_name;
        } else {
            $current_short_name = session()->get('session_short_name');
        }    
        $current_language_id = Language::where('short_name',$current_short_name)->first()->id;
        
        // $informasi = Informasi::where('language_id',$current_language_id)->first();
        $informasi = Informasi::all();
        $total_pemasukan = Informasi::where('jenis_transaksi', 'pemasukan')
            ->sum('dana');
        $total_pengeluaran = Informasi::where('jenis_transaksi', 'pengeluaran')
            ->sum('dana');
        $total = intval($total_pemasukan) - intval($total_pengeluaran);

        $total_pemasukan = 'Rp ' . number_format($total_pemasukan, 2, ',', '.');
        $total_pengeluaran = 'Rp ' . number_format($total_pengeluaran, 2, ',', '.');

        $total = 'Rp ' . number_format($total, 2, ',', '.   ');
        return view('front.kasmasjid', compact('informasi', 'total', 'total_pemasukan', 'total_pengeluaran'));
    }
    
}
