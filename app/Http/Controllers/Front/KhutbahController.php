<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Language;
use App\Helper\Helpers;

class KhutbahController extends Controller
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
        
        // $jadwal = Jadwal::where('language_id',$current_language_id)->first();
        $jadwal = Jadwal::all();
        return view('front.jadwalkhutbah', compact('jadwal'));
    }
}
