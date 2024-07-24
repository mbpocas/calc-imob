@extends('layouts.basic')

@section('title', 'Simulação')

@section('content')

    <div id="loading" >
        <i class="fas fa-spinner fa-spin"></i>
        <div class="mt-3">
            <p>Calculando</p>
        </div>
    </div>

    <div id="simulacao-card">
        <form method="POST" action="{{ route('simulacao.store') }}" id="form-store" class="form-row">
            @csrf

            <div class="mt-2 p-3">
                <div class="row">
                    <div class="form-group col-md">
                        <label for="formControlRange">
                            Renda <span class="text-danger">*</span>
                        </label><br><br>
                        <input type="range" class="form-control-range" id="formControlRange" min="1"
                            max="{{ count($consultas) }}" step="1" value="{{ old('renda_id') ?? 1 }}">
                        <p class="mt-2 text-center font-weight-bold h5" id="info-selecionada"></p>
                    </div>
                </div>
            </div>

            <div class="row mt-3 text-center justify-content-center align-items-center" id="subsidio-options">
                <div class="form-group col-md-3">
                    <label for="com-subsidio">Com Dependentes</label><br>
                    <input type="radio" id="com-subsidio" name="subsidio" value="1"
                        {{ old('subsidio') == '1' ? 'checked' : '' }} required>
                </div>
                <div class="form-group col-md-3">
                    <label for="sem-subsidio">Sem Dependentes</label><br>
                    <input type="radio" id="sem-subsidio" name="subsidio" value="0"
                        {{ old('subsidio') == '0' ? 'checked' : '' }}>
                </div>
            </div>


            <div class="row mt-4 text-center justify-content-center align-items-center">
                <div class="form-group col-md-4">
                    <label for="valor_imovel">Valor do Imóvel</label>
                    <input type="text" class="form-control mt-2" id="valor_imovel" name="valor_imovel" placeholder="R$"
                        oninput="formatarValorImovel(this)" value="{{ old('valor_imovel') }}">
                </div>
                <p class="text-danger" style="font-size: 11px">
                    <small>Para calcular o valor da entrada, informe o valor doimóvel.(Não obrigatório)</small>
                </p>
            </div>


            <input type="hidden" name="renda_id" id="renda_id" value="{{ old('renda_id') }}">


            <div class="p-3">
                <div class=" row mt-3 mb-5" id="contato">
                    <div class="form-group col-md mt-4">
                        <label for="name">Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                            name="nome" placeholder="Digite seu nome" value="{{ old('nome') }}"required>
                        @error('nome')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md mt-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Digite seu email" value="{{ old('email') }}"required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md mt-4">
                        <label for="telefone">Telefone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone"
                            name="telefone" maxlength="11" placeholder="( ) _____-_____" oninput="formatarTelefone(this)"
                            value="{{ old('telefone') }}" required>
                        @error('telefone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-12 mt-5 text-center">
                    <button type="submit" class="btn btn-lg" id="btn-simular">SIMULAR</button>
                </div>
            </div>
        </form>
    </div>
@endsection

<script>
    var consultas = @json($consultas);

    // Função para limpar o formulário
    function clearForm() {
        document.getElementById('form-store').reset();
    }

    // Detecta quando a página é carregada pelo botão "Voltar" do navegador
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            clearForm();
        }
    });
</script>
<script src="{{ asset('js/index.js') }}"></script>
