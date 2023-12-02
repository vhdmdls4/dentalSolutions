<!-- visualizar_orcamentos.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Orçamento - DenteSoft </title>
    <link rel="icon" href="assets/brand/DenteSoft.png" type="png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        p {
            margin: 0;
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }

        strong {
            font-weight: bold;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <?php
    // Recuperando o nome do arquivo do parâmetro da URL
    $nomeArquivo = $_GET['arquivo'] ?? '';

    // Verifica se o nome do arquivo foi fornecido
    if (!empty($nomeArquivo)) {
        // Obtém o caminho completo para o arquivo de orçamento
        $caminhoCompleto = 'orcamentos/' . $nomeArquivo;

        // Verifica se o arquivo existe
        if (file_exists($caminhoCompleto)) {
            // Lê o conteúdo do arquivo
            $conteudo = file_get_contents($caminhoCompleto);

            // Exibe o conteúdo formatado
            echo "<h2>Detalhes do Orçamento</h2>";
            echo "<pre>$conteudo</pre>";
        } else {
            echo "<p>O arquivo de orçamento não foi encontrado.</p>";
        }
    } else {
        // Caso não seja fornecido um nome de arquivo válido
        echo "<p>Nenhum arquivo de orçamento selecionado.</p>";
    }
    ?>
</body>
</html>
