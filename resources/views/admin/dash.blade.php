@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-3 p-2">
                <div class="card shadow">
                    <div class="card-body cards-dash text-center">
                        Total Simulações<br>
                        {{ $totalSimulacoes }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="card shadow">
                    <div class="card-body cards-dash text-center">
                        Contatos Únicos<br>
                        {{ $totalContatosUnicos }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="card shadow">
                    <div class="card-body cards-dash text-center">
                        Rendas (-) R$ 5.000<br>
                        {{ $simulacoesRendaMenorQue5000 }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="card shadow">
                    <div class="card-body cards-dash text-center">
                        Rendas (+) R$ 5.000<br>
                        {{ $simulacoesRendaMaiorQue5000 }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-1">
            <div class="col-md-12 p-2 justify-content-center">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="p-3">
                            <h4 class="card-title text-dark d-flex justify-content-between align-items-center">
                                Simulações
                                <span>
                                    <a href="{{route('admin')}}" class="btn btn-light"data-toggle="tooltip" data-placement="top" title="Voltar">
                                        <i class="fas fa-arrow-circle-left text-dark"></i>
                                    </a>
                                    <div class="dropdown d-inline" data-toggle="tooltip" data-placement="left"
                                        data-container="body" title="Configurações">
                                        <button class="btn btn-light" type="button" id="config"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cog text-secondary"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="config">
                                            <a class="dropdown-item" href="{{ route('consulta.index') }}">Tabela
                                                Consulta</a>
                                        </div>
                                    </div>
                                </span>
                            </h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <!-- Cabeçalho da tabela -->
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>Email</th>
                                            <th>Renda</th>
                                            <th>Subsídio</th>
                                            <th>Criado em</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Loop sobre as simulações -->
                                        @foreach ($simulacoes as $simulacao)
                                            <tr>
                                                <td class="text-center">
                                                    <a href="{{ route('simulacao.show', $simulacao->id) }}">
                                                        {{ $simulacao->id }}
                                                    </a>
                                                </td>
                                                <td>{{ ucfirst($simulacao->contato->nome) }}</td>
                                                <td class="text-center">{{ $simulacao->contato->telefone }}</td>
                                                <td>{{ $simulacao->contato->email }}</td>
                                                <td class="text-center">
                                                    R$ {{ number_format($simulacao->consulta->renda, 2, ',', '.') }}
                                                </td>
                                                <td class="text-center">{{ $simulacao->subsidio ? 'Com' : 'Sem' }}</td>
                                                <td class="text-center">{{ $simulacao->created_at->format('d/m/Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="py-4">
                                {{ $simulacoes->onEachSide(0)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
