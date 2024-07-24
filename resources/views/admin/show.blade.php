@extends('layouts.basic')

@section('title', 'Detalhes')

@section('content')

    <div="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-8" id="resultado">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h4 class="card-title text-dark ">
                            <div class="row">
                                <div class="col-md d-flex mb-4 mb-md-0 align-items-center">
                                    Detalhes
                                </div>
                            </div>
                        </h4>
                        <div class=" d-flex justify-content-end col-md-12">
                            <small><b>Criado em:</b> {{ $simulacao->created_at->format('d/m/Y - H:i') }}</small>
                        </div>
                        <div class="mt-1 p-3">
                            <p><b>Nome:</b> {{ ucfirst($simulacao->contato->nome) }}<br>
                                <b>E-mail:</b> {{ $simulacao->contato->email }}<br>
                                <b>Telefone:</b> {{ $simulacao->contato->telefone }}<br>
                                <b>Renda:</b> {{ 'R$ ' . number_format($simulacao->consulta->renda, 2, ',', '.') }}<br>
                                <b>Subsídio:</b> {{ $simulacao->subsidio ? 'Com depentente' : 'Sem depentente' }}<br>
                                <b>Valor do imóvel:</b>
                                {{ $simulacao->valor_imovel ? 'R$ ' . number_format($simulacao->valor_imovel, 2, ',', '.') : 'Não informado' }}
                            </p>
                        </div>
                        <div class="mt-2 p-3">
                            <div class="row text-center">
                                <div class="form-group col-md-3">
                                    <label for="juros">Juros</label>
                                    <p class="form-control text-center" id="juros">{{ $simulacao->consulta->juros }} %
                                    </p>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="price">Financiamento</label>
                                    <p class="form-control text-center" id="price">
                                        {{ 'R$ ' . number_format($simulacao->consulta->price, 2, ',', '.') }}</p>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="parcela">1ª Parcela</label>
                                    <p class="form-control text-center" id="parcela">
                                        {{ 'R$ ' . number_format($simulacao->consulta->parcela, 2, ',', '.') }}</p>
                                </div>
                                @if ($simulacao->subsidio)
                                    <div class="form-group col-md-3">
                                        <label for="subsidio">Subsídio</label>
                                        <p class="form-control text-center" id="subsidio">
                                            {{ 'R$ ' . number_format($simulacao->consulta->sub_com, 2, ',', '.') }}</p>
                                    </div>
                                @else
                                    <div class="form-group col-md-3">
                                        <label for="subsidio">Subsídio</label>
                                        <p class="form-control text-center" id="subsidio">
                                            {{ 'R$ ' . number_format($simulacao->consulta->sub_sem, 2, ',', '.') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="row mt-2 justify-content-center text-center">
                                <div class="col-md-4">
                                    <label for="valor_entrada">Entrada</label>
                                    <p class="form-control text-center" id="valor_entrada">
                                        {{ 'R$ ' . number_format(max($simulacao->valor_entrada, 0), 2, ',', '.') }}
                                    </p>
                                </div>
                            </div>

                            <div class="row mt-4 justify-content-center text-center border-top">
                                <div class="col-md-12 mt-2">
                                    @if ($outrasSimulacoes->isNotEmpty())
                                        <p><b>
                                            O contato {{ $simulacao->contato->telefone }} possui outras simulações:
                                        </p></b>
                                        <h5>
                                            [
                                                @foreach ($outrasSimulacoes as $index => $outraSimulacao)
                                                    <a
                                                        href="{{ route('simulacao.show', $outraSimulacao->id) }}">{{ $outraSimulacao->id }}
                                                    </a>
                                                    {{ $index !== $outrasSimulacoes->count() - 1 ? ', ' : '' }}
                                                @endforeach
                                            ]
                                        </h5>
                                        <p style="font-size: 11px"><small>
                                            Clique no id da simulação desejada para acessá-la.
                                        </small></p>
                                        
                                    @else
                                        <p><b>Este contato não realizou outras simulações.</b></p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-12 mt-5 text-center">
                                <a href="{{ route('dash') }}" class="btn btn-primary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>



    @endsection
