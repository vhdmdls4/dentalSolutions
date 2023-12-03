<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se os dados do formulário estão presentes
    if (isset($_POST['arquivo']) && isset($_POST['conteudoArquivo'])) {
        // Obtenha os dados do formulário
        $arquivoParaEditar = $_POST['arquivo'];
        $conteudoAtualizado = $_POST['conteudoArquivo'];

        // Construa o caminho completo do arquivo
        $caminhoCompleto = 'orcamentos/' . $arquivoParaEditar;

        // Verifique se o arquivo existe antes de salvar
        if (file_exists($caminhoCompleto)) {
            // Salve o conteúdo atualizado no arquivo
            file_put_contents($caminhoCompleto, $conteudoAtualizado);

            // Redirecione para a página de visualização ou outra página desejada
            header('Location: visualizar_orcamentos.php?arquivo=' . $arquivoParaEditar);
            exit;
        } else {
            // Arquivo não encontrado, redirecione ou exiba uma mensagem de erro
            header('Location: paginaDeErro.php');
            exit;
        }
    } else {
        // Dados do formulário ausentes, redirecione ou exiba uma mensagem de erro
        header('Location: paginaDeErro.php');
        exit;
    }
} else {
    // Método de requisição inválido, redirecione ou exiba uma mensagem de erro
    header('Location: paginaDeErro.php');
    exit;
}
?>
