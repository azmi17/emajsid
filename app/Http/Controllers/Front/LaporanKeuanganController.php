<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\LaporanKeuangan;
use App\Models\Language;
use App\Helper\Helpers;

class LaporanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Helpers::read_json();

        if(!session()->get('session_short_name')) {
            $current_short_name = Language::where('is_default','Yes')->first()->short_name;
        } else {
            $current_short_name = session()->get('session_short_name');
        }
        $current_language_id = Language::where('short_name',$current_short_name)->first()->id;

        $datas = LaporanKeuangan::all();
        return view('front.laporan_keuangan', compact('datas'));
    }

    public function download($id)
    {
        $lapkeu = LaporanKeuangan::where('id', $id)->firstOrFail();
        $filePath = storage_path("app/public/{$lapkeu->file_path}");

        if (file_exists($filePath)) {
            $fileName = basename($lapkeu->file_path);
            return response()->download($filePath, $fileName);
        } else {
            abort(404, 'File not found');
        }
    }
}
