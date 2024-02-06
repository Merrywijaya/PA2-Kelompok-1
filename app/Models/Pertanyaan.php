<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan';
    protected $fillable = [
        'teks' => 'required',
        'id_m_pengguna',
    ];

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'id_m_pertanyaan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_m_pengguna');
    }
}

