<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Storage;

class AdminProfilMasjidController extends Controller
{
    public function sejarah() 
    {
        $profil_data = Profil::with('rLanguage')->get();
        return view('admin.profil_masjid_sejarah', compact('profil_data'));
    }

    public function sejarah_update(Request $request)
    {
        $request->validate([
            'sejarah_title' => 'required',
            'sejarah_detail' => 'required'
        ]);
        
        $profil = Profil::where('id',$request->id)->first();
        $profil->sejarah_title = $request->sejarah_title;
        $profil->sejarah_detail = $request->sejarah_detail;
        $profil->sejarah_status = $request->sejarah_status;
        $profil->update();

        return redirect()->route('admin_profil_masjid_sejarah')->with('success', 'Data is updated successfully.');
    }

    public function pengurus() 
    {
        $profil = Profil::with('rLanguage')->get();
        return view('admin.pengurus_show', compact('profil'));
    }

    public function pengurus_update(Request $request)
    {

        if ($request->hasFile('pengurus_photo')) {
            $request->validate([
                'pengurus_photo' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);
        
            $profil = Profil::first(); // Mengambil satu entitas Profil pertama
        
            // Hapus gambar yang ada sebelumnya (jika ada)
            if ($profil->pengurus_photo) {
                Storage::delete($profil->pengurus_photo);
            }
            if($request->hasFile('pengurus_photo')) {
                $request->validate([
                    'pengurus_photo' => 'image|mimes:jpg,jpeg,png,gif'
                ]);
    
                $now = time();
                $ext = $request->file('pengurus_photo')->extension();
                $final_name = 'pengurus_photo_'.$now.'.'.$ext;
                $request->file('pengurus_photo')->move(public_path('uploads/'),$final_name);
                $profil->pengurus_photo = $final_name;
            }
        
            $profil->save();
        
            return redirect()->route('admin_profil_masjid_pengurus_show')->with('success', 'Gambar pengurus berhasil diunggah.');
        }
    
        return redirect()->route('admin_profil_masjid_pengurus_show')->with('success', 'Gambar pengurus berhasil diunggah.');
    }

}
