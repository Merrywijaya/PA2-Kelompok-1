<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteJawaban extends Model
{
    use HasFactory;

    protected $table = 'vote_jawaban';
    protected $fillable = ['user_id', 'jawaban_id', 'vote'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class);
    }
}
