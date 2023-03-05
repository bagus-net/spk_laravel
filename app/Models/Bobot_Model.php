<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot_Model extends Model
{
    use HasFactory;
    protected $table ='spk_bobot';
    protected $fileable= [
        'id_kriteria',
        'nilai_bobot'
    ];
}
