<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nama_pengguna' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('nama_pengguna', $credentials['nama_pengguna'])->first();

        if (!$user) {
            return back()->with('loginError', 'Login failed!');
        }

        if ($user->is_blocked == 1) {
            return back()->with('loginError', 'Anda telah diblokir!');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role_id == 4) {
                return redirect()->route('admin.index');
            } elseif ($user->role_id == 3) {
                return redirect()->route('superuser.index');
            } else {
                return redirect()->intended('/qna');
            }
        }

        return back()->with('loginError', 'Login failed!');
    }
}
