<?php require_once('./index.php');

// Verificar se um arquivo foi selecionado para edição
if (isset($_GET['arquivo'])) {
    $arquivoParaEditar = $_GET['arquivo'];
    $caminhoCompleto = 'orcamentos/' . $arquivoParaEditar;

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

        // Analisar o conteúdo do arquivo para obter os procedimentos
        preg_match('/Procedimentos Selecionados:(.+)/s', $conteudoArquivo, $matchesProcedimentos);
        $procedimentos = isset($matchesProcedimentos[1]) ? $matchesProcedimentos[1] : '';

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

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se os dados do formulário estão presentes
    if (isset($_POST['arquivo']) && isset($_POST['conteudoArquivo'])) {
        // Obtenha os dados do formulário
        $arquivoParaEditar = $_POST['arquivo'];
        $conteudoAtualizado = $_POST['conteudoArquivo'];

        // Obtenha a nova data do conteúdo atualizado
        preg_match('/Data de Realização do Orçamento: (\d{2}\/\d{2}\/\d{4})/', $conteudoAtualizado, $matches);
        $novaData = $matches[1];

        // Construa o novo nome do arquivo com base na nova data
        $novoNomeArquivo = str_replace('/', '', $novaData) . '_' . basename($arquivoParaEditar);

        // Construa o caminho completo do arquivo
        $novoCaminhoCompleto = 'orcamentos/' . $novoNomeArquivo;

        // Renomeie o arquivo
        if (rename($caminhoCompleto, $novoCaminhoCompleto)) {
            // Salve o conteúdo atualizado no novo arquivo
            file_put_contents($novoCaminhoCompleto, $conteudoAtualizado);

            // Redirecione para a página de visualização ou outra página desejada
            header('Location: visualizar_orcamentos.php?arquivo=' . $novoNomeArquivo);
            exit;
        } else {
            // Falha ao renomear o arquivo, redirecione ou exiba uma mensagem de erro
            header('Location: paginaDeErro.php');
            exit;
        }
    } else {
        // Dados do formulário ausentes, redirecione ou exiba uma mensagem de erro
        header('Location: paginaDeErro.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Orçamento - DenteSoft </title>
    <!-- Adicione os estilos necessários para a formatação da página -->
    <!-- Inclua aqui links para folhas de estilo CSS, se necessário -->
</head>
<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h2 class="mt-5">Edição de Orçamento</h2>
        <form id="editarOrcamento" action="salvarEdicao.php" method="post" aria-label="Formulário de Edição de Orçamento">
            <!-- Adicione um campo oculto para enviar o nome do arquivo -->
            <input type="hidden" name="arquivo" value="<?= $arquivoParaEditar ?>">

            <!-- Adicione campos separados para cada dado do orçamento -->
            <label for="nomePaciente">Nome do Paciente:</label>
            <input type="text" name="nomePaciente" value="<?= $nomePaciente ?>"><br>

            <label for="dataRealizacao">Data de Realização do Orçamento:</label>
            <input type="text" name="dataRealizacao" value="<?= $dataRealizacao ?>"><br>

            <label for="statusOrcamento">Status do Orçamento:</label>
            <input type="text" name="statusOrcamento" value="<?= $statusOrcamento ?>"><br>

            <label for="conteudoArquivo">Informações do Orçamento:</label><br>
            <!-- Adicione uma área de texto para edição do conteúdo do arquivo -->
            <textarea name="conteudoArquivo" rows="10" cols="50"><?= htmlspecialchars($conteudoArquivo) ?></textarea><br>

            <!-- Adicione um botão para enviar o formulário -->
            <button type="submit">Salvar</button>
        </form>

        <!-- Adicione os scripts necessários para a interatividade, se necessário -->
        <!-- Inclua aqui scripts JavaScript, se necessário -->
    </main>
</body>
</html>
