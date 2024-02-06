<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\kecamatan;
use App\Models\sekolah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $provinsi = Provinsi::all();
        $sekolah = Sekolah::all();
        
        $selectedProvinsiId = $user->id_r_provinsi;
        $kabupaten = Kabupaten::where('id_r_provinsi', $selectedProvinsiId)->get();

        $selectedKabupatenId = $user->id_r_kabupaten;
        $kecamatan = kecamatan::where('id_r_kabupaten', $selectedKabupatenId)->get();

    return view('profile.edit', compact('user', 'provinsi', 'kabupaten', 'kecamatan', 'sekolah'));
    }

    public function update(Request $request, $id)
{
    $allowedAttributes = [
        'email',
        'alamat',
        'nama',
        'id_r_sekolah',
        'id_r_provinsi',
        'id_r_kabupaten',
        'id_r_kecamatan',
        'no_whatsapp'
    ];

    $user = User::findOrFail($id);

    foreach ($request->only($allowedAttributes) as $attribute => $value) {
        if ($attribute === 'id_r_provinsi') {
            // Ambil ID provinsi dari request dan simpan ke user
            $provinsi = Provinsi::where('id', $value)->first();
            if ($provinsi) {
                $user->$attribute = $provinsi->id;

                $kabupaten = Kabupaten::where('id_r_provinsi', $provinsi->id)->first();
                if ($kabupaten) {
                    $user->id_r_kabupaten = $kabupaten->id;

                        $kecamatan = kecamatan::where('id_r_kabupaten', $kabupaten->id)->first();
                        if ($kecamatan) {
                        $user->id_r_kecamatan = $kecamatan->id;
                }
                }
            }
        } else {
            $user->$attribute = $value;
        }
        $user->id_r_sekolah = $request->input('id_r_sekolah');
    }

    $user->save();

    return redirect()->back()->with('success', 'Your answer has been submitted!');
}


}
