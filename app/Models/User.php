<?php

namespace App\Models;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_whatsapp',
        'nama_pengguna',
        'email',
        'password',
        'alamat',
        'nama',
        'role_id',
        'id_r_sekolah',
        'id_r_provinsi',
        'id_r_kabupaten',
        'is_blocked',
        'is_suspended',
        'id_r_kecamatan'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function komentar() 
    {
        return $this->hasOne(komentar::class);
    }

    public function role(){
        return $this->hasOne(role::class, 'id');
    }

    public function role2()
{
    return $this->belongsTo(Role::class, 'role_id');
}

    public static function boot()
{
    parent::boot();

    static::creating(function ($user) {
        $user->recovery_token = Str::random(32);
    });
}

public function simpan($user)
{
    if ($this->recovery_token && $this->isDirty('recovery_token')) {
        $this->recovery_token = $this->getOriginal('recovery_token');
    } else {
        $user->recovery_token = Str::random(32);
    }
}

public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class, 'id_m_pengguna');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'id_m_pengguna');
    }

    public function sekolah()
{
    return $this->belongsTo(Sekolah::class);
}

public static function getSchoolList()
{
    return Sekolah::pluck('Nama', 'id');
}

}
