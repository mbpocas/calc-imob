@extends('layouts.basic')

@section('title', 'Resultado')

@section('content')


    <div id="resultado" style="display: block;">
        <h4 class="card-title text-dark ">
            <div class="row">
                <div class="text-center mt-1" id="resultado-title">
                    Veja agora seu resultado!
                </div>
            </div>
        </h4>

        <div class="mt-3 p-3 text-center">
            <p>Nome: {{ ucfirst($simulacao->contato->nome) }}<br>
                Renda: {{ 'R$ ' . number_format($simulacao->consulta->renda, 2, ',', '.') }}<br>
                Subsídio: {{ $simulacao->subsidio ? 'Com depentente' : 'Sem depentente' }}<br>
                Valor do imóvel:
                {{ $simulacao->valor_imovel ? 'R$ ' . number_format($simulacao->valor_imovel, 2, ',', '.') : 'Não informado' }}

            </p></strong>
        </div>

        <div class="mt-1 p-3">
            <div class="row text-center">
                <div class="form-group col-md-3">
                    <label for="juros">Juros</label>
                    <strong>
                        <p class="border-0 text-center" id="juros">{{ $simulacao->consulta->juros }} %</p>
                    </strong>
                </div>
                <div class="form-group col-md-3">
                    <label for="price">Financiamento</label>
                    <strong>
                        <p class="border-0 text-center" id="price">
                            {{ 'R$ ' . number_format($simulacao->consulta->price, 2, ',', '.') }}</p>
                    </strong>
                </div>
                <div class="form-group col-md-3">
                    <label for="parcela">1ª Parcela</label>
                    <strong>
                        <p class="border-0 text-center" id="parcela">
                            {{ 'R$ ' . number_format($simulacao->consulta->parcela, 2, ',', '.') }}</p>
                    </strong>
                </div>
                @if ($simulacao->subsidio)
                    <div class="form-group col-md-3">
                        <label for="subsidio">Subsídio</label>
                        <strong>
                            <p class="border-0 text-center" id="subsidio">
                                {{ 'R$ ' . number_format($simulacao->consulta->sub_com, 2, ',', '.') }}</p>
                        </strong>
                    </div>
                @else
                    <div class="form-group col-md-3">
                        <label for="subsidio">Subsídio</label>
                        <strong>
                            <p class="border-0 text-center" id="subsidio">
                                {{ 'R$ ' . number_format($simulacao->consulta->sub_sem, 2, ',', '.') }}</p>
                        </strong>
                    </div>
                @endif
            </div>

            @php
                $subsidioValue = $simulacao->subsidio ? $simulacao->consulta->sub_com : $simulacao->consulta->sub_sem;
            @endphp

            <div class="row mt-2 justify-content-center text-center">
                <div class="form-group col-md-4">
                    <label for="valor_entrada">Entrada</label>
                    <strong>
                        <p class="border-0 text-center mb-2" id="valor_entrada">
                            {{ 'R$ ' . number_format(max($simulacao->valor_imovel - $simulacao->consulta->price - $subsidioValue, 0), 2, ',', '.') }}
                        </p>    
                    </strong>
                    
                    <small>
                        <a href="{{ route('simulacao.index') }}" style="color:#7600CB">Refazer</a>
                    </small>
                </div>
            </div>
        </div>

        <div class="mt-2 p-3 text-center" style="color:#7600CB">
            <h5><b>O valor de entrada é super facilitado pelas construtoras.</b></h5>
            <h6 class="mt-3">Agora que você descobriu o seu pontencial de financiamento.<br> Clique no botão abaixo e
                escolha seu novo lar!</h6>
        </div>
        <div class="form-group col-md-12 mt-1 text-center">
            <a href="#" class="btn" style="background-color: #7600CB; color: white;">
                <i class="fa-solid fa-map-location-dot" style="margin-right: 10px;"></i>
                <u>Ir para o mapa</u>
            </a>
        </div>
    </div>

@endsection
