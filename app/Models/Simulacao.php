<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;
use App\Models\Consulta;

class Simulacao extends Model
{
    use HasFactory;
    protected $table = 'simulacoes';

    protected $fillable = [
        'contato_id',
        'consulta_id',
        'subsidio',
        'valor_imovel',
        'valor_entrada',
    ];

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }
}
