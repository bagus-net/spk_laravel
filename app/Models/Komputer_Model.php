<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komputer_Model extends Model
{
    use HasFactory;
    protected $table ='spk_komputer';
    protected $fileable= [
        'merk_komputer',
        'type_komputer',
        'harga_komputer',
        'stok'
    ];
}
