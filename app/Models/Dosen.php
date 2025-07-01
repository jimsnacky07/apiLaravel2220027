<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nidn',
        'namadosen',
        'email',
        'telepon',
        'alamat'
    ];

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }
}