<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Suspend;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

class UserController extends Controller
{   
    public function index()
{
    $users = User::with('role')->get();
    $roles = Role::all();
    $roleNames = [
        1 => 'penanya',
        2 => 'penjawab',
        3 => 'superuser',
        4 => 'admin',
        // Daftar pasangan ID peran dan nama peran lainnya
    ];
    return view('admin.index', compact('users', 'roles', 'roleNames'));
}

public function superuser()
{
    $users = User::with('role')->get();
    $roles = Role::all();
    $roleNames = [
        1 => 'penanya',
        2 => 'penjawab',
        3 => 'superuser',
        4 => 'admin',
        // Daftar pasangan ID peran dan nama peran lainnya
    ];
    return view('superuser.index', compact('users', 'roles', 'roleNames'));
}
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->update($request->all());

    
    // Simpan perubahan lainnya jika diperlukan
    $user->save();
    
    return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus jawaban ini!');
}

public function update2(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->update($request->all());

    
    // Simpan perubahan lainnya jika diperlukan
    $user->save();
    
    return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus jawaban ini!');
}

    public function Ban($id) {
        $user = user::find($id);
    
        // Periksa apakah jawaban ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'Jawaban tidak ditemukan.');
        }
    
        // Set jawaban terpilih (pinned)
        $user->is_blocked = true;
        $user->save();
    
        return redirect()->back()->with('success', 'Your answer has been submitted!');
    }

    public function Unban($id) {
        $user = user::find($id);
    
        // Periksa apakah komentar ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'Komentar tidak ditemukan.');
        }
    
        // Set komentar tidak terpilih (unpinned)
        $user->is_blocked = false;
        $user->save();
    
        return redirect()->back()->with('success', 'Komentar berhasil di-unpin.');
    }

    public function HalamanBan(){
        $users = User::all();
        $status = [
            0 => 'unban',
            1 => 'ban'
            // Daftar pasangan ID peran dan nama peran lainnya
        ];
        return view('admin.ban', compact('users', 'status'));
    }

    public function processBan(Request $request)
{
    $id = $request->input('id');
    $user = User::find($id);

    // Periksa apakah user ditemukan
    if (!$user) {
        return redirect()->back()->with('error', 'User tidak ditemukan.');
    }

    // Set user terbanned
    $user->is_blocked = true;
    $user->save();

    return redirect()->back()->with('success', 'User berhasil dibanned.');
}

public function suspend(User $user, Request $request)
    {
        $duration = $request->input('duration');
        $user->suspend($duration);

        // Jalankan perintah scheduler
        Artisan::call('schedule:run');

        return redirect()->back()->with('success', 'Pengguna berhasil disuspend selama ' . $duration . ' menit.');
    }

    public function unsuspend(User $user)
    {
        $user->unsuspend();

        return redirect()->back()->with('success', 'Pengguna berhasil diunsuspend.');
    }

public function HalamanSuspend(){
    $users = User::all();
    return view('admin.suspend', compact('users'));
}

public function processSuspend(Request $request)
{
    $id = $request->input('id');
    $user = User::find($id);

    // Periksa apakah user ditemukan
    if (!$user) {
        return redirect()->back()->with('error', 'User tidak ditemukan.');
    }

    // Set user terbanned
    $user->is_suspended = true;
    $user->save();

    return redirect()->back()->with('success', 'User berhasil dibanned.');
}

public function HalamanBan2(){
    $users = User::all();
    $status = [
        0 => 'unban',
        1 => 'ban'
        // Daftar pasangan ID peran dan nama peran lainnya
    ];
    return view('superuser.ban', compact('users', 'status'));
}

}
