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
        'telepon',
        'keterangan',
        'deskripsi',
        'foto',
    ];

    public function scopeGender($query, $filter)
    {

        $query->when($filter ?? false, function ($query, $gender) {
            return $query->where('gender', $gender);
        });
    }

    public function scopeKet($query, $filter){
        $query->when($filter ?? false, function ($query, $ket) {
            return $query->where('keterangan', $ket);
        });
    }

    public function scopeUmur($query, array $filters)
    {
        $query->when($filters['min_umur'] ?? false, function ($query, $min) {
            return $query->where('umur', '>=', $min);
        });

        $query->when($filters['max_umur'] ?? false, function ($query, $max) {
            return $query->where('umur', '<=', $max);
        });
    }
}
