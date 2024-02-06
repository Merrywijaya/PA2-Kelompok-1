<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForgetPassword extends Controller
{
    public function showResetForm()
    {
        return view('auth.gantipassword');
    }

    public function reset(Request $request)
    {
        $user = User::where('nama_pengguna', $request->nama_pengguna)
            ->where('recovery_token', $request->recovery_token)
            ->first();

        if (!$user) {
            return back()->withErrors(['nama_pengguna' => 'Invalid username or token']);
        }

        // Reset password pengguna
        $user->password = Hash::make($request->password);
        $user->recovery_token = Str::random(32);
        $user->save();

        return redirect('/login');
    }
}
