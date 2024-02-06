<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class komentar extends Controller
{
    public function answer(Request $request, $id) {
        if (auth()->check()) {
            $comment = new Jawaban();
            $comment->teks = $request->input('teks');
            $comment->id_m_pertanyaan = $id;
            $comment->id_m_pengguna = auth()->user()->id;
            $comment->save();
        // return redirect('/post')->with('success', 'Your question has been submitted!');
        return redirect('/qna')->with('success', 'Your answer has been submitted!');
    } else {
        return redirect('/qna')->with('error', 'Please login to submit an answer.');
    }
}
}

