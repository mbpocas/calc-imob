<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultas = Consulta::all();
        
        return view('consulta.index', compact('consultas'));
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
        return abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $consulta = Consulta::findOrFail($id);
        return view('consulta.edit', compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'renda' => 'required|numeric',
            'juros' => 'required|numeric',
            'price' => 'required|numeric',
            'parcela' => 'required|numeric',
            'sub_com' => 'required|numeric',
            'sub_sem' => 'required|numeric',
        ], [
            'renda.required' => 'O campo renda é obrigatório.',
            'renda.numeric' => 'O campo renda deve ser um valor válido.',
            'juros.required' => 'O campo juros é obrigatório.',
            'juros.numeric' => 'O campo juros deve ser um valor válido.',
            'price.required' => 'O campo price é obrigatório.',
            'price.numeric' => 'O campo price deve ser um valor válido.',
            'parcela.required' => 'O campo parcela é obrigatório.',
            'parcela.numeric' => 'O campo parcela deve ser um valor válido.',
            'sub_com.required' => 'O campo sub com é obrigatório.',
            'sub_com.numeric' => 'O campo sub com deve ser um valor válido.',
            'sub_sem.required' => 'O campo sub sem é obrigatório.',
            'sub_sem.numeric' => 'O campo sub sem deve ser um valor válido.',
        ]);

        $consulta = Consulta::findOrFail($id);
        $consulta->update($request->all());

        return redirect()->route('consulta.index')->with('success', 'Consulta atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }
}
