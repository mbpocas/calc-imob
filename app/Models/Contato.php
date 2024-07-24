<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Simulacao;


class Contato extends Model
{
    use HasFactory;
    protected $table = 'contatos';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
    ];

    public function simulacao()
    {
        return $this->hasOne(Simulacao::class);
    }
}