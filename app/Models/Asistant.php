<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'umur',
        'gender',
        'alamat',
        'keterangan',
        'deskripsi',
        'foto',
    ];
}
