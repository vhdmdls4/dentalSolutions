<?php
require_once('./index.php');

// Verificar se um arquivo foi selecionado para aprovação
if (isset($_GET['arquivo'])) {
    $arquivoParaAprovar = $_GET['arquivo'];
    $caminhoCompleto = 'orcamentos/' . $arquivoParaAprovar;

    // Verificar se o arquivo existe
    if (file_exists($caminhoCompleto)) {
        // Ler o conteúdo do arquivo
        $conteudoArquivo = file_get_contents($caminhoCompleto);

        // Analisar o conteúdo do arquivo para obter os dados
        preg_match('/Nome do Paciente: (.+)/', $conteudoArquivo, $matchesNomePaciente);
        $nomePaciente = isset($matchesNomePaciente[1]) ? $matchesNomePaciente[1] : '';

        preg_match('/Data de Realização do Orçamento: (.+)/', $conteudoArquivo, $matchesDataRealizacao);
        $dataRealizacao = isset($matchesDataRealizacao[1]) ? $matchesDataRealizacao[1] : '';

        preg_match('/Status do Orçamento: (.+)/', $conteudoArquivo, $matchesStatusOrcamento);
        $statusOrcamento = isset($matchesStatusOrcamento[1]) ? $matchesStatusOrcamento[1] : '';

        // Se a confirmação for recebida via parâmetro GET
        if (isset($_GET['confirmacao']) && $_GET['confirmacao'] === 'true') {
            // Aprovar o orçamento alterando o status
            $statusAprovado = '(A) Aprovado';
            $conteudoAtualizado = preg_replace('/Status do Orçamento: (.+)/', 'Status do Orçamento: ' . $statusAprovado, $conteudoArquivo);
        
            // Salvar o conteúdo atualizado no mesmo arquivo
            file_put_contents($caminhoCompleto, $conteudoAtualizado);
        
            // Exibir mensagem de aprovação e fechar a aba
            echo "<script>alert('Orçamento aprovado com sucesso!'); window.close();</script>";
        }
    
        // Construir a mensagem de confirmação em JavaScript
        $confirmacaoJS = "if(confirm('Deseja realmente aprovar este orçamento?')) { window.location.href = 'aprova_orcamento.php?arquivo={$arquivoParaAprovar}&confirmacao=true'; }";

        // Incluir o JavaScript de confirmação na saída HTML
        echo "<script>{$confirmacaoJS}</script>";
    } else {
        // Arquivo não encontrado, redirecionar ou exibir uma mensagem de erro
        header('Location: paginaDeErro.php');
        exit;
    }
} else {
    // Nenhum arquivo selecionado, redirecionar ou exibir uma mensagem de erro
    header('Location: paginaDeErro.php');
    exit;
}
?>
