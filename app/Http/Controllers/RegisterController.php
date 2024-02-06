<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::select('id', 'nama')->get();
        return view('auth.register', compact([
            'role',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RegisterRequest $request)
    {
        $password = $request->input('password'); // assign the password value to a variable

        $request->merge([
            'password' => Hash::make($password),
            'role_id' => '1' // tambahkan kode ini untuk menetapkan role default
        ]);

        // generate otp
        $otp = mt_rand(100000, 999999);

        // send otp to whatsapp
        $whatsapp = new \App\Services\Whatsapp\WhatsappService();
        $whatsapp->sendMessage($request->input('no_whatsapp'), "Kode OTP Anda adalah: $otp. Jangan berikan kode kepada siapapun. Kode akan kadaluarsa dalam 5 menit.");

        // save otp to session with 5 minutes expired
        $request->session()->put('otp', $otp);
        $request->session()->put('expired', now()->addMinutes(5));
        return response()->json([
            'message' => 'Kode OTP telah dikirim ke nomor whatsapp Anda',
            'status' => 'success'
        ]);
    }

    public function otp(Request $request)
    {
        $otp = $request->input('otp');
        $expired = $request->session()->get('expired');
        $now = now();

        if ($now > $expired) {
            return redirect()->back()->with('error', 'Kode OTP sudah kadaluarsa');
        }

        if ($otp != $request->session()->get('otp')) {
            return redirect()->back()->with('error', 'Kode OTP tidak cocok');
        }

        $request->merge([
            'role_id' => 1,
            'password' => Hash::make($request->input('password'))
        ]);
        User::create($request->except('otp'));
        // set session success
        $request->session()->flash('success', 'Registrasi berhasil, silahkan login');
        return response()->json([
            'message' => 'Registrasi berhasil, silahkan login',
            'status' => 'success'
        ]);
    }
}
