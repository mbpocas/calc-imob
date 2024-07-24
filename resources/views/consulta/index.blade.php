@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 p-2 justify-content-center">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="p-3">
                            <h4 class="card-title text-dark d-flex justify-content-between align-items-center">
                                Consulta
                                <span>
                                    <a href="{{ route('dash') }}" class="btn btn-light"data-toggle="tooltip"
                                        data-placement="top" title="Voltar">
                                        <i class="fas fa-arrow-circle-left text-dark"></i>
                                    </a>
                                </span>
                            </h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <!-- Cabeçalho da tabela -->
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Renda</th>
                                            <th>Juros</th>
                                            <th>Price</th>
                                            <th>Parcela</th>
                                            <th>Com Subsídio</th>
                                            <th>Sem Subsídio</th>
                                            <th>Atualizado em</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Loop sobre as simulações -->
                                        @foreach ($consultas as $consulta)
                                            <tr>
                                                <td class="text-center">
                                                    <a href="{{ route('consulta.edit', $consulta->id) }}">
                                                        {{ $consulta->id }}
                                                    </a>
                                                </td>
                                                <td class="text-center">R$
                                                    {{ number_format($consulta->renda, 2, ',', '.') }}</td>
                                                <td class="text-center">{{ $consulta->juros }}%</td>
                                                <td class="text-center">R$
                                                    {{ number_format($consulta->price, 2, ',', '.') }}</td>
                                                <td class="text-center">
                                                    R$ {{ number_format($consulta->parcela, 2, ',', '.') }}
                                                </td>
                                                <td class="text-center">
                                                    R$ {{ number_format($consulta->sub_com, 2, ',', '.') }}
                                                </td>
                                                <td class="text-center">
                                                    R$ {{ number_format($consulta->sub_sem, 2, ',', '.') }}
                                                </td>
                                                <td class="text-center">{{ $consulta->updated_at->format('d/m/Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
