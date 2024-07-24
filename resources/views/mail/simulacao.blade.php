<!DOCTYPE html>
<html>
<head>
    <title>Novo Lead</title>
</head>
<body>
    <p>
        <b>Nome:</b> {{ ucfirst($simulacao->contato->nome) }}<br>
        <b>E-mail:</b> {{ $simulacao->contato->email }}<br>
        <b>Telefone:</b> {{ $simulacao->contato->telefone }}<br>
    </p>
    
    <br>
    <p>
        <b>Detalhes da Simulação:</b><br>
        <b>Renda:</b> {{ 'R$ ' . number_format($simulacao->consulta->renda, 2, ',', '.') }}<br>
        <b>Subsídio:</b> {{ $simulacao->subsidio ? 'Com depentente' : 'Sem depentente' }}<br>
        <b>Valor do imóvel:</b>
        {{ $simulacao->valor_imovel ? 'R$ ' . number_format($simulacao->valor_imovel, 2, ',', '.') : 'Não informado' }}<br>
        <b>Juros:</b> {{ $simulacao->consulta->juros }} %<br>
        <b>Financiamento:</b> {{ 'R$ ' . number_format($simulacao->consulta->price, 2, ',', '.') }}<br>
        <b>1ª Parcela:</b> {{ 'R$ ' . number_format($simulacao->consulta->parcela, 2, ',', '.') }}<br>
        <b>Subsídio:</b>
        @if ($simulacao->subsidio)
            {{ 'R$ ' . number_format($simulacao->consulta->sub_com, 2, ',', '.') }}
        @else
            {{ 'R$ ' . number_format($simulacao->consulta->sub_sem, 2, ',', '.') }}
        @endif
        <br>
        <b>Entrada:</b> {{ 'R$ ' . number_format(max($simulacao->valor_entrada, 0), 2, ',', '.') }}<br>
    </p>
    
    
</body>
</html>
