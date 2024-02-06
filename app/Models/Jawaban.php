<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban';
    protected $fillable = [
        'teks',
        'id_m_pertanyaan',
        'id_m_pengguna',
        'vote_up',
        'vote_down',
        'user_vote'
    ];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_m_pertanyaan');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'id_m_jawaban');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_m_pengguna');
    }
}
