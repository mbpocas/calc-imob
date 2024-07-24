

function formatarTelefone(input) {
    // Remove todos os caracteres não numéricos
    var telefone = input.value.replace(/\D/g, '');

    // Insere os parênteses, espaço e traço nos lugares corretos
    telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, '($1)$2-$3');

    // Atualiza o valor do campo de entrada com o telefone formatado
    input.value = telefone;
}

function formatarValorImovel(input) {
    let valor = input.value.replace(/\D/g, '');
    if (valor.length > 2) {
        valor = valor.slice(0, -2) + ',' + valor.slice(-2);
    }
    if (valor.length > 6) {
        valor = valor.slice(0, -6) + '.' + valor.slice(-6);
    }
    if (valor.length > 10) {
        valor = valor.slice(0, -10) + '.' + valor.slice(-10);
    }
    input.value = 'R$ ' + valor;
}


function selecaoRenda() {
    var rangeInput = document.getElementById('formControlRange');
    var rendaIdInput = document.getElementById('renda_id');

    rangeInput.addEventListener('input', function() {
        var index = parseInt(rangeInput.value) - 1;
        var id = consultas[index].id;
        
        rendaIdInput.value = id;

        var renda = consultas[index].renda;
        var rendaFormatada = 'R$' + parseFloat(renda).toFixed(2).replace(/\./g, ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        // Atualiza o parágrafo abaixo com as informações da consulta selecionada
        document.getElementById('info-selecionada').innerText = rendaFormatada;
    });

    var initialIndex = rangeInput.value - 1; // O valor inicial do range input - 1 para obter o índice correto
    var initialRenda = 'R$' + parseFloat(consultas[initialIndex].renda).toFixed(2).replace(/\./g, ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    document.getElementById('info-selecionada').innerText = initialRenda;
}

// Chamamos a função quando o documento estiver pronto
document.addEventListener('DOMContentLoaded', function() {
    selecaoRenda();
    
    document.getElementById('form-store').addEventListener('submit', function(event) {
        event.preventDefault(); // Impede a submissão padrão do formulário
    
        // Oculta o card de simulação e mostra o ícone de loading
        document.getElementById('simulacao-card').style.display = 'none';
        document.getElementById('loading').style.display = 'block';
    
        // Aguarda 3 segundos antes de enviar o formulário
        setTimeout(() => {
            event.target.submit(); // Submete o formulário
        }, 2000);
    });
});

