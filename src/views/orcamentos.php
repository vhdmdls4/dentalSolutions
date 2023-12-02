<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2 class="mt-5" aria-label="Orçamentos">Lista de Orçamentos</h2>

    <!-- Restante do seu código -->

    <div class="orcamento-lista">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome do Orçamento</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Caminho para a pasta de orçamentos
                $caminhoOrcamentos = './orcamentos/';

                // Obtém a lista de arquivos na pasta
                $arquivosOrcamentos = scandir($caminhoOrcamentos);

                // Remove os diretórios . e ..
                //Aloooo
                $arquivosOrcamentos = array_diff($arquivosOrcamentos, array('..', '.'));

                // Exibe os orçamentos em uma tabela
                foreach ($arquivosOrcamentos as $arquivo) {
                    // Ignora o arquivo .DS_Store
                    if ($arquivo != ".DS_Store") {
                        $caminhoCompleto = $caminhoOrcamentos . $arquivo;
                        echo "<tr>";
                        echo "<td>$arquivo</td>";
                        echo "<td>";
                        echo "<a href=\"visualizar_orcamentos.php?arquivo=$arquivo\" target=\"_blank\"><i class=\"bi bi-eye\"></i></a> | ";
                        echo "<a href=\"aprovaOrcamento.php?arquivo=$arquivo\" target=\"_blank\"><i class=\"bi bi-check\"></i></a> | ";
                        echo "<a href=\"reprovar_orcamento.php?arquivo=$arquivo\"><i class=\"bi bi-x\"></i></a>";
                    
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        
    </script>
</main>

<?php require_once('./footer.php'); ?>