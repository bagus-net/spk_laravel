<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif_Model extends Model
{
    use HasFactory;
    protected $table ='alternatif';
    protected $fileable= [
        'kode_alternatif',
        'nama_alternatif'
    ];
}
