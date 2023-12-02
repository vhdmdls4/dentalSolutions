<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 2000px;">
    <h2 class="mt-4">Editar Orçamento</h2>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Recupera o nome do arquivo do orçamento a ser editado
        $arquivoOrcamento = $_GET['arquivo'] ?? '';

        // Verifica se o arquivo existe
        $caminhoCompleto = 'orcamentos/' . $arquivoOrcamento;
        if (file_exists($caminhoCompleto)) {
            // Lê o conteúdo do arquivo
            $conteudoArquivo = file_get_contents($caminhoCompleto);
            $linhas = explode("\n", $conteudoArquivo);

            // Exibe o formulário de edição
            echo '<form action="salvar_edicao_orcamento.php" method="post">';
            foreach ($linhas as $linha) {
                list($chave, $valor) = explode(": ", $linha, 2);

                // Exibe campos editáveis
                echo '<div class="mb-3">';
                echo '<label for="' . htmlspecialchars($chave) . '" class="form-label">' . htmlspecialchars($chave) . ':</label>';
                echo '<input type="text" class="form-control" id="' . htmlspecialchars($chave) . '" name="' . htmlspecialchars($chave) . '" value="' . htmlspecialchars($valor) . '" required>';
                echo '</div>';
            }

            // Adicione um campo oculto para passar o nome do arquivo ao salvar
            echo '<input type="hidden" name="arquivo" value="' . htmlspecialchars($arquivoOrcamento) . '">';

            // Botão de envio
            echo '<button type="submit" class="btn btn-primary">Salvar Alterações</button>';
            echo '</form>';
        } else {
            echo '<p>O arquivo de orçamento não foi encontrado.</p>';
        }
    }
    ?>

</main>

<?php require_once('./footer.php'); ?>
