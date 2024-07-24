<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\NovaSimulacao;
use App\Models\Consulta;
use App\Models\Contato;
use App\Models\Simulacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimulacaoController extends Controller
{

    public function __construct() 
    {
        // Use a closure to define the middleware logic directly in the constructor
        $this->middleware(function ($request, $next) {
            if (!Auth::check()) {
                return abort(404);
            }
            return $next($request);
        })->only('show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultas = Consulta::all();
        $idsAndRenda = [];


        foreach ($consultas as $consulta) {
            $idsAndRenda[$consulta->id] = $consulta->renda;
        }

        return view('index', compact('consultas', 'idsAndRenda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telefone' => 'required|string|min:11',
            'renda_id' => 'required|exists:credito_imob_consulta,id',
            'subsidio' => 'required',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de email válido.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.min' => 'Por favor, insira um número de telefone válido.',
            'renda_id.required' => 'O campo renda é obrigatório.',
            'renda_id.exists' => 'A renda selecionada é inválida.',
            'subsidio.required' => 'O campo subsídio é obrigatório.',
        ]);


        $valorImovel = empty($request->valor_imovel) ? null : str_replace(['R$', '.', ','], ['', '', '.'], $request->valor_imovel);

        $consulta = Consulta::find($request->renda_id);
        $subsidio = $request->subsidio ? $consulta->sub_com : $consulta->sub_sem;


        // Cria um novo contato
        $contato = Contato::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
        ]);

        $entrada = $valorImovel ? $valorImovel - $consulta->price - $subsidio : null;

        // Cria uma nova simulação associada ao contato
        $simulacao = Simulacao::create([
            'contato_id' => $contato->id,
            'consulta_id' => $request->renda_id,
            'subsidio' => $request->subsidio,
            'valor_imovel' => $valorImovel,
            'valor_entrada' => $entrada,
        ]);


        $request->session()->put('simulacao_feita', true);
        
        // Envia o email para o integrador
        //Mail::to('weehouseleads@gmail.com')->send(new NovaSimulacao($simulacao));
        //Mail::to('mbpocas@hotmail.com')->send(new NovaSimulacao($simulacao));

        // Redireciona para a página index com a variável $simulacao
        return redirect()->route('resultado');
    }

    public function resultado(Request $request)
    {

        if (!$request->session()->has('simulacao_feita')) {
            return redirect()->route('simulacao.index'); // Redireciona para a página inicial ou outra página
        }

        $simulacao = Simulacao::latest()->first();

        $request->session()->forget('simulacao_feita');

        return view('resultado', compact('simulacao'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Busca a simulação pelo ID
        $simulacao = Simulacao::findOrFail($id);

        $telefone = $simulacao->contato->telefone;

        $outrasSimulacoes = Simulacao::whereHas('contato', function ($query) use ($telefone) {
            $query->where('telefone', $telefone);
        })->where('id', '<>', $simulacao->id)->get();

        // Retorna a view 'show' passando a simulação como parâmetro
        return view('admin.show', compact('simulacao', 'outrasSimulacoes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }
}
