<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertanyaanController extends Controller
{
    public function index() {
        return view('pertanyaan');
    }

public function create(Request $request) {

    if(auth()->check()){
    $ask = new Pertanyaan;
    $ask->teks = $request->input('teks');
    $ask->id_m_pengguna = auth()->user()->id;
    $ask->save();
    
    return redirect('/qna')->with('success', 'Your question has been submitted!');
    } else {
        return redirect('/ask')->with('error', 'Silakan login untuk mengirimkan pertanyaan.');
    }
}   
}
