<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria_Model extends Model
{
    protected $table ='spk_kriteria';
    protected $fileable= [
        'kriteria',
        'type_kriteria'

    ];
}
