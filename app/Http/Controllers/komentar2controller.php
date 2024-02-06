<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class komentar2controller extends Controller
{
    public function komentar(Request $request, $id) {
        if (auth()->check()) {
            $comment2 = new Komentar();
            $comment2->teks = $request->input('teks');
            $comment2->id_m_jawaban = $id;
            $comment2->id_m_pengguna = auth()->user()->id;
            $comment2->save();
        // return redirect('/post')->with('success', 'Your question has been submitted!');
        return redirect('/qna')->with('success', 'Your answer has been submitted!');
    } else {
        return redirect('/qna')->with('error', 'Please login to submit an answer.');
    }
}
}
