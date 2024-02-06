<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    protected $fillable = ['nama', 'id_r_provinsi'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_r_provinsi');
    }
}