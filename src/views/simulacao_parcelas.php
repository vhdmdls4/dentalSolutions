<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2 class="mt-5" aria-label="Cadastro de cliente">Simulador de Tarifas</h2>
    <form id="registrarCliente" action="" aria-label="Formulário de Cadastro de Cliente" title="Formulário de cadastro de cliente">
        <div class="mb-3">
            <label for="rg" class="form-label">Valor Cobrado:</label>
            <div class="input-group">
                <span class="input-group-text">R$</span>
                <input type="number" class="form-control" id="valor" name="valor" aria-label="Valor Cobrado" required>
            </div>
        </div>
        <!-- Adicione o seletor de parcelas -->
        <div class="mb-3">
            <label for="parcelas" class="form-label">Parcelamento:</label>
            <select class="form-select" id="parcelas" aria-label="Selecione o número de parcelas" title="Selecione o número de parcelas">
                <option value="1">Débito</option>
                <option value="2">À vista</option>
                <option value="3">2x</option>
                <option value="4">3x</option>
                <option value="5">4x</option>
                <option value="6">5x</option>
                <option value="7">6x</option>
                <!--<option value="8">7x</option>
                <option value="9">8x</option>
                <option value="10">9x</option>
                <option value="11">10x</option>
                <option value="12">11x</option>
                <option value="13">12x</option>-->
            </select>
        </div>

        <!-- Adicione elementos para mostrar os resultados -->
        <div id="resultados" class="mb-3">
            <p id="valorTotal">Valor Total: R$0.00</p>
            <p id="valorComJuros">Valor com Juros: R$0.00</p>
        </div>
    </form>

    <script>
        document.getElementById('registrarCliente').addEventListener('input', function () {
            // Obtem o valor do procedimento
            const valorProcedimento = parseFloat(document.getElementById('valor').value.replace(',', '.'));

            // Define as porcentagens das taxas de débito para cada parcela
            const taxasDebito = [1.38, 3.16, 5.40, 6.13, 6.86, 7.58, 8.29, 9.00, 9.70, 10.39, 11.07, 11.75, 12.41];

            // Obtem o número de parcelas selecionado pelo usuário
            const numParcelas = parseInt(document.getElementById('parcelas').value);

            // Obtém a taxa correspondente ao número de parcelas
            const taxa = taxasDebito[numParcelas - 1] / 100;

            // Inicializa os valores total e com juros
            let valorTotal = 0;
            let valorComJuros = 0;

            if (!isNaN(valorProcedimento) && valorProcedimento > 0) {
                // Calcula os valores total e com juros
                valorTotal = valorProcedimento;
                valorComJuros = (numParcelas === 1) ? valorProcedimento : valorProcedimento * (1 + taxa);
            }

            // Exibe os valores calculados na tela
            document.getElementById('valorTotal').innerText = "Valor Total: R$" + valorTotal.toFixed(2);
            document.getElementById('valorComJuros').innerText = "Valor com Juros: R$" + valorComJuros.toFixed(2);
        });
    </script>
</main>

<?php require_once('./footer.php'); ?>
