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
    <h2>Detalhes do Orçamento</h2>

    <?php
    // Se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Recuperando os parâmetros da URL
        $nomePaciente = $_GET['nome'] ?? '';
        $dataFormatada = date('d/m/Y H:i:s'); // Obtendo a data e hora atual
        $statusOrcamento = $_GET['status'] ?? '';
        $valorTotal = $_GET['valorTotal'] ?? 0;

        // Mapeando códigos de status para textos completos
        $statusTextos = [
            'P' => '(P) Para Aprovação',
            'A' => '(A) Aprovado',
            'R' => '(R) Recusado',
        ];

        // Obtendo o texto completo do status
        $statusCompleto = isset($statusTextos[$statusOrcamento]) ? $statusTextos[$statusOrcamento] : $statusOrcamento;

        // Exibindo os detalhes do orçamento
        echo "<p><strong>Nome do Paciente:</strong> $nomePaciente</p>";
        echo "<p><strong>Data de Realização do Orçamento:</strong> $dataFormatada</p>";
        echo "<p><strong>Status do Orçamento:</strong> $statusCompleto</p>";

        // Exibindo procedimentos selecionados
        if (isset($_GET['procedimentosSelecionados'])) {
            $procedimentosSelecionados = json_decode($_GET['procedimentosSelecionados'], true);

            echo "<p><strong>Procedimentos Selecionados:</strong></p>";
            echo "<ul>";
            foreach ($procedimentosSelecionados as $procedimento) {
                $nomeProcedimento = $procedimento['nome'];
                $quantidade = $procedimento['quantidade'];
                $valorUnitario = $procedimento['valorUnitario'];
                $observacoes = $procedimento['observacoes']; // Adiciona a exibição das observações
                echo "<li>$nomeProcedimento - Quantidade: $quantidade, Valor Unitário: R$ $valorUnitario,00, Observações: $observacoes</li>";
            }
            echo "</ul>";
        }

        echo "<p><strong>Valor Total:</strong> R$ $valorTotal,00</p>";

        // Criar um nome de arquivo único com base no nome do paciente e na data
        $nomeArquivo = 'orcamentos/' . str_replace(' ', '', $nomePaciente) . '_' . date('dmYHis') . '.txt';

        // Criar o conteúdo a ser salvo no arquivo
        $conteudoArquivo = "Nome do Paciente: $nomePaciente\n";
        $conteudoArquivo .= "Data de Realização do Orçamento: $dataFormatada\n";
        $conteudoArquivo .= "Status do Orçamento: $statusCompleto\n";

        if (isset($_GET['procedimentosSelecionados'])) {
            $conteudoArquivo .= "Procedimentos Selecionados:\n";
            foreach ($procedimentosSelecionados as $procedimento) {
                $nomeProcedimento = $procedimento['nome'];
                $quantidade = $procedimento['quantidade'];
                $valorUnitario = $procedimento['valorUnitario'];
                $observacoes = $procedimento['observacoes'];
                $conteudoArquivo .= "$nomeProcedimento - Quantidade: $quantidade, Valor Unitário: R$ $valorUnitario,00, Observações: $observacoes\n";
            }
        }

        $conteudoArquivo .= "Valor Total: R$ $valorTotal,00\n";

        // Salvar o conteúdo no arquivo
        file_put_contents($nomeArquivo, $conteudoArquivo);
    }
    ?>
</body>
</html>
