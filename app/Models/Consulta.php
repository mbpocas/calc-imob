<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $table = 'credito_imob_consulta';

    protected $fillable = [
        'renda',
        'juros',
        'price', 
        'parcela', 
        'sub_com', 
        'sub_sem'
    ];
}
