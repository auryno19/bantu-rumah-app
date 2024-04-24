<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistant extends Model
{
    protected $table = 'asistants';
    protected $primaryKey = 'id';

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
