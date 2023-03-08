<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria_Model extends Model
{
    use HasFactory;
    protected $table ='kriteria';
    protected $fileable= [
        'kode_kriteria',
        'nama_kriteria',
        'bobot',
        'jenis'
    ];
}
