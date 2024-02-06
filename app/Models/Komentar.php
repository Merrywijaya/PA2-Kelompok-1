<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar';
    protected $fillable = [
        'teks',
        'id_m_jawaban',
        'id_m_pengguna',
    ];

    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class, 'id_m_jawaban');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_m_pengguna');
    }
}
