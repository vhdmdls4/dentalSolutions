<?php
if(isset($_GET['arquivo'])) {
    $arquivo = $_GET['arquivo'];
    $caminhoCompleto = 'orcamentos/' . $arquivo;
    
    // Lógica para mover o arquivo para a pasta de orçamentos aprovados
    $caminhoAprovados = './orcamentos_aprovados/';
    $caminhoNovo = $caminhoAprovados;
    
    if (rename($caminhoCompleto, $caminhoNovo)) {
        echo "Orçamento aprovado com sucesso!";
    } else {
        echo "Erro ao aprovar o orçamento.";
    }
} else {
    echo "Parâmetro 'arquivo' não encontrado.";
}
?>
