<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Simulacao;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        return view('admin.index');
    }

    public function dashboard()
    {
        // Subconsulta para pegar o último id de cada telefone
        $latestSimulacaoIds = Simulacao::selectRaw('MAX(simulacoes.id) as id')
            ->join('contatos', 'simulacoes.contato_id', '=', 'contatos.id')
            ->groupBy('contatos.telefone')
            ->pluck('id');

        // Consulta principal para pegar os registros das simulações com os últimos ids encontrados
        $simulacoes = Simulacao::with('contato', 'consulta')
            ->whereIn('id', $latestSimulacaoIds)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $totalSimulacoes = Simulacao::count();
        $totalContatosUnicos = Contato::distinct('telefone')->count('telefone');

        $simulacoesRendaMaiorQue5000 = Simulacao::whereHas('consulta', function ($query) {
            $query->where('renda', '>', 5000);
        })->count();

        $simulacoesRendaMenorQue5000 = Simulacao::whereHas('consulta', function ($query) {
            $query->where('renda', '<', 5000);
        })->count();

        // Retorna a view 'dash' com as simulações
        return view('admin.dash', compact('simulacoes', 'totalSimulacoes', 'totalContatosUnicos', 'simulacoesRendaMaiorQue5000', 'simulacoesRendaMenorQue5000'));
    }
}
