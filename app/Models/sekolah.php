<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sekolah extends Model
{
    protected $table = 'sekolah';
    protected $fillable = [
        'Nama',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'alamat',
        'npsn',
    ];

    public function users()
{
    return $this->hasMany(User::class);
}
}
