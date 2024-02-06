<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\jawaban as ModelsJawaban;
use App\Models\Pertanyaan;
use App\Models\komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\VoteJawaban;

class qnaController extends Controller
{
    public function index() {
        $total_jawaban = jawaban::count();
        $total_pertanyaan = pertanyaan::count();
        $asks = Pertanyaan::withCount('jawaban')->with('user')->paginate(10);

        
        

        return view('qna.index', compact([
            'asks',
            'total_jawaban',
            'total_pertanyaan'
        ]));
    }

    public function show($id) {
        $ask = Pertanyaan::with('jawaban')->find($id);
        $ask2 = Jawaban::with('komentar')->find($id);
        $comment_count = Jawaban::where('id_m_pertanyaan', $id)->count();
        $jawabanVotes = DB::table('jawaban')
        ->select('id', DB::raw('COUNT(*) as vote_up_count'))
        ->where('vote_up', '=', 'up')
        ->groupBy('id')
        ->get();

        
        $komentar3 = Komentar::where('id_m_jawaban', $id)->get(); // Mengambil komentar dengan id_m_jawaban yang cocok dengan $id
        $roleNames = [
            1 => 'penanya',
            2 => 'penjawab',
            3 => 'superuser',
            4 => 'admin',];

        return view('qna.post-deatils', compact('ask', 'ask2', 'comment_count', 'komentar3', 'roleNames', 'jawabanVotes'));
    }
    

    public function create(Request $request,$id) {
        
        
        if (auth()->check()) {
            $comment = new Jawaban();
            $comment->teks = $request->input('teks');
            $comment->id_m_pertanyaan = $id;
            $comment->id_m_pengguna = auth()->user()->id;
            $comment->save();

        // return redirect('/post')->with('success', 'Your question has been submitted!');
        return redirect()->back()->with('success', 'Your answer has been submitted!');
    } else {
        return redirect()->back()->with('success', 'Your answer has been submitted!');
    }
    }

    public function komentar(Request $request, $id)
{
    if (auth()->check()) {
        $request->validate([
            'teks' => 'required',
        ]);
        $komentar = new Komentar();
        $komentar->teks = $request->input('teks');
        $komentar->id_m_jawaban = $id;
        $komentar->id_m_pengguna = auth()->user()->id;
        $komentar->save();

        return redirect()->back()->with('success', 'Your comment has been submitted!');
    } else {
        return redirect()->back()->with('error', 'You need to login to submit a comment!');
    }
}


    public function hapusKomentar($id) {
        $komentar3 = Komentar::find($id);
    
        // Periksa apakah pengguna yang login adalah pemilik komentar
        if (Auth::check() && $komentar3 && $komentar3->id_m_pengguna === Auth::user()->id || Auth::user()->role_id === 4 || Auth::user()->role_id === 3) {
            $komentar3->delete();
    
            return redirect()->back()->with('success', 'Your answer has been submitted!');
    } else {
            return redirect()->back()->with('success', 'Your answer has been submitted!');
    }
    }

    public function hapusjawaban($id) {
        $jawaban = Jawaban::find($id);
        
        // Periksa apakah pengguna yang login adalah pemilik jawaban
        if (Auth::check() && $jawaban && $jawaban->id_m_pengguna === Auth::user()->id || Auth::user()->role_id === 4 || Auth::user()->role_id === 3) {
            // Hapus komentar yang terkait dengan jawaban yang akan dihapus
            foreach ($jawaban->komentar as $komentar) {
                $komentar->delete();
            }
    
            $jawaban->delete();
    
            return redirect()->back()->with('success', 'Jawaban berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus jawaban ini!');
        }
    }
    

    public function pinJawaban($id) {
        $jawaban = Jawaban::find($id);
    
        // Periksa apakah jawaban ditemukan
        if (!$jawaban) {
            return redirect()->back()->with('error', 'Jawaban tidak ditemukan.');
        }
    
        // Set jawaban terpilih (pinned)
        $jawaban->pinned = true;
        $jawaban->save();

        $jawaban = Jawaban::orderByDesc('pinned')->get();
    
        return redirect()->back()->with('success', 'Your answer has been submitted!');
    }

    public function unpinJawaban($id) {
        $jawaban = Jawaban::find($id);
    
        // Periksa apakah jawaban ditemukan
        if (!$jawaban) {
            return redirect()->back()->with('error', 'Jawaban tidak ditemukan.');
        }
    
        // Set jawaban tidak terpilih (unpinned)
        $jawaban->pinned = false;
        $jawaban->save();
    
        return redirect()->back()->with('success', 'Jawaban berhasil di-unpin.');
    }
    

    public function pinkomentar($id) {
        $komentar1 = Komentar::find($id);
    
        // Periksa apakah jawaban ditemukan
        if (!$komentar1) {
            return redirect()->back()->with('error', 'Jawaban tidak ditemukan.');
        }
    
        // Set jawaban terpilih (pinned)
        $komentar1->pinned = true;
        $komentar1->save();

        $komentar1 = Jawaban::orderByDesc('pinned')->get();
    
        return redirect()->back()->with('success', 'Your answer has been submitted!');
    }

    public function unpinkomentar($id) {
        $komentar = Komentar::find($id);
    
        // Periksa apakah komentar ditemukan
        if (!$komentar) {
            return redirect()->back()->with('error', 'Komentar tidak ditemukan.');
        }
    
        // Set komentar tidak terpilih (unpinned)
        $komentar->pinned = false;
        $komentar->save();
    
        return redirect()->back()->with('success', 'Komentar berhasil di-unpin.');
    }
    

    public function voteJawaban(Request $request, Jawaban $jawaban)
    {
        $vote = $request->input('vote');
        $jawabanId = $request->input('jawaban_id');

        // Memeriksa apakah pengguna sudah memberikan suara sebelumnya
        $userVote = VoteJawaban::where('jawaban_id', $jawabanId)
                                ->where('user_id', auth()->user()->id)
                                ->first();

        if ($userVote) {
            // Jika pengguna sudah memberikan suara sebelumnya
            if ($userVote->vote === $vote) {
                // Batalkan suara
                $userVote->delete();
                $jawaban->decrement($vote === 'up' ? 'vote_up' : 'vote_down');
            } else {
                // Ubah suara
                $userVote->vote = $vote;
                $userVote->save();

                if ($vote === 'up') {
                    $jawaban->increment('vote_up');
                    $jawaban->decrement('vote_down');
                } else {
                    $jawaban->decrement('vote_up');
                    $jawaban->increment('vote_down');
                }
            }
        } else {
            // Jika pengguna belum memberikan suara sebelumnya
            $newVote = new VoteJawaban();
            $newVote->jawaban_id = $jawabanId;
            $newVote->user_id = auth()->user()->id;
            $newVote->vote = $vote;
            $newVote->save();

            if ($vote === 'up') {
                $jawaban->increment('vote_up');
            } else {
                $jawaban->increment('vote_down');
            }
        }

        // Jumlah vote up pada setiap jawaban oleh semua user
        $totalVoteUp = Jawaban::sum('vote_up');

        return redirect()->back()->with('totalVoteUp', $totalVoteUp);
    }




    




public function hapuspertanyaan($id)
{
    $pertanyaan = Pertanyaan::find($id);

    // Periksa apakah pengguna yang login adalah pemilik pertanyaan
    if (Auth::check() && $pertanyaan && $pertanyaan->id_m_pengguna === Auth::user()->id || Auth::user()->role_id === 4 || Auth::user()->role_id === 3) {
        // Hapus komentar yang terkait dengan jawaban
        foreach ($pertanyaan->jawaban as $jawaban) {
            foreach ($jawaban->komentar as $komentar) {
                $komentar->delete();
            }
            $jawaban->delete();
        }

        $pertanyaan->delete();

        return redirect()->back()->with('success', 'Pertanyaan beserta jawaban dan komentar berhasil dihapus!');
    } else {
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus pertanyaan ini!');
    }
}

}
