<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $fillable = ['nama', 'id_r_kabupaten'];

    public function kecamatan()
    {
        return $this->belongsTo(kabupaten::class, 'id_r_kabupaten');
    }
}
