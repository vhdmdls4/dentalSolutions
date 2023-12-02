<?php require_once('./index.php'); ?>

<style>
    .custom-small-input {
        padding: 0.00005rem 0.05rem;
        font-size: 0.75rem;
        width: 20px;
        height: 31px;
    }

    .input-group-btn {
        display: flex;
        flex-direction: column;
        height: 100%;
        margin-left: 2px;
        width: 20px;
        height: 20px;
    }

    .btn {
        height: 40%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .table-container {
        max-height: 300px;
        overflow-y: auto;
    }

    .procedimento-adicionado {
        background-color: #fff;
    }
</style>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 2000px;">
    <h2 class="mt-5" aria-label="Criar Orçamento">Novo Orçamento</h2>

    <form id="novoOrcamentoForm" action="" aria-label="Formulário de Novo Orçamento" title="Formulário de novo orçamento">
        <div class="mb-3">
            <label for="nomePaciente" class="form-label">Nome do Paciente:</label>
            <input type="text" class="form-control" id="nomePaciente" name="nomePaciente" aria-required="true" aria-label="Nome do Paciente" title="Nome do Paciente" required>
        </div>

        <div class="mb-3">
            <label for="dentista" class="form-label">Dentista Responsável pelo Orçamento:</label>
            <select class="form-select" id="dentista" name="dentista" aria-label="Selecione o dentista" title="Selecione o dentista" required>
                <option value="Dr. Victor Hugo">Dr. Victor Hugo</option>
                <option value="Dr. Eduardo">Dr. Eduardo Oliveira</option>
                <option value="Dr. Henrique Tropia">Dr. Henrique Tropia</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="dataRealizacao" class="form-label">Data de Realização do Orçamento:</label>
            <input type="date" class="form-control" id="dataRealizacao" name="dataRealizacao" aria-label="Data de Realização do Orçamento" title="Data de Realização do Orçamento" required>
        </div>

        <div class="mb-3">
            <label for="statusOrcamento" class="form-label">Status do Orçamento:</label>
            <select class="form-select" id="statusOrcamento" name="statusOrcamento" aria-label="Selecione o status do orçamento" title="Selecione o status do orçamento" required>
                <option value="P">(P) Para Aprovação</option>
                <option value="A">(A) Aprovado</option>
                <option value="R">(R) Recusado</option>
            </select>
        </div>

        <div class="mb-3">
            <div class="table-container">
                <table class="table" id="procedimentosTable">
                    <thead>
                        <tr>
                            <th>Procedimento</th>
                            <th>Quantidade</th>
                            <th>Observações</th> <!-- Novo campo para observações -->
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="procedimento-row">
                            <td>
                                <select class="form-select procedimento-select" data-valor="50">
                                    <option value="0" selected disabled>Selecione o Procedimento</option>
                                    <option value="50">Procedimento 1 - R$ 50,00</option>
                                    <option value="100">Procedimento 2 - R$ 100,00</option>
                                </select>
                            </td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <button class="btn btn-outline-secondary" type="button" onclick="decrement(this)">-</button>
                                    <input type="text" class="custom-small-input quantidade-input" value="0" readonly>
                                    <button class="btn btn-outline-secondary" type="button" onclick="increment(this)">+</button>
                                </div>
                            </td>
                            <td>
                                <input type="text" class="form-control observacoes-input" placeholder="Observações">
                            </td>
                            <td>
                                <button class="btn btn-danger" type="button" onclick="removerProcedimento(this)">Remover</button>
                            </td>
                        </tr>
                        <tr class="procedimento-row procedimento-row-template" style="display: none;">
                            <td>
                                <select class="form-select procedimento-select" data-valor="">
                                    <option value="0">Selecione o Procedimento</option>
                                    <option value="50">Procedimento 1 - R$ 50,00</option>
                                    <option value="100">Procedimento 2 - R$ 100,00</option>
                                </select>
                            </td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <button class="btn btn-outline-secondary" type="button" onclick="decrement(this)">-</button>
                                    <input type="text" class="custom-small-input quantidade-input" value="0" readonly>
                                    <button class="btn btn-outline-secondary" type="button" onclick="increment(this)">+</button>
                                </div>
                            </td>
                            <td>
                                <input type="text" class="form-control observacoes-input" placeholder="Observações">
                            </td>
                            <td>
                                <button class="btn btn-danger" type="button" onclick="removerProcedimento(this)">Remover</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-success" onclick="adicionarProcedimento()">Adicionar Procedimento</button>
        </div>

        <button type="submit" class="btn btn-primary">Gerar Orçamento</button>
    </form>

    <script>
        function increment(button) {
            var row = button.closest('.procedimento-row');
            var quantidadeInput = row.querySelector('.quantidade-input');
            quantidadeInput.value = parseInt(quantidadeInput.value) + 1;
        }

        function decrement(button) {
            var row = button.closest('.procedimento-row');
            var quantidadeInput = row.querySelector('.quantidade-input');
            if (parseInt(quantidadeInput.value) > 0) {
                quantidadeInput.value = parseInt(quantidadeInput.value) - 1;
            }
        }

        function adicionarProcedimento() {
            const templateRow = document.querySelector('.procedimento-row-template');
            const newRow = templateRow.cloneNode(true);
            newRow.classList.remove('procedimento-row-template');
            newRow.style.display = '';

            const procedimentoSelect = newRow.querySelector('.procedimento-select');
            const quantidadeInput = newRow.querySelector('.quantidade-input');
            const observacoesInput = newRow.querySelector('.observacoes-input');

            procedimentoSelect.selectedIndex = 0;
            quantidadeInput.value = '0';
            observacoesInput.value = ''; // Limpa o campo de observações

            document.querySelector('#procedimentosTable tbody').appendChild(newRow);
        }

        function removerProcedimento(button) {
            const row = button.closest('.procedimento-row');
            row.remove();
        }

        document.getElementById('novoOrcamentoForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const nomePaciente = document.getElementById('nomePaciente').value;
            const dentistaSelecionado = document.getElementById('dentista').value;
            const dataRealizacao = document.getElementById('dataRealizacao').value;
            const statusOrcamento = document.getElementById('statusOrcamento').value;

            const procedimentosSelecionados = [];
            const procedimentoRows = document.querySelectorAll('#procedimentosTable tbody tr.procedimento-row');

            procedimentoRows.forEach(function (row) {
                const procedimentoSelect = row.querySelector('.procedimento-select');
                const quantidadeInput = row.querySelector('.quantidade-input');
                const observacoesInput = row.querySelector('.observacoes-input');

                if (procedimentoSelect.value !== "0") {
                    const procedimento = {
                        nome: procedimentoSelect.options[procedimentoSelect.selectedIndex].text,
                        quantidade: parseInt(quantidadeInput.value),
                        valorUnitario: parseFloat(procedimentoSelect.value),
                        observacoes: observacoesInput.value, // Inclui observações no objeto procedimento
                    };

                    procedimentosSelecionados.push(procedimento);
                }
            });

            const valorTotal = procedimentosSelecionados.reduce((total, procedimento) => total + procedimento.quantidade * procedimento.valorUnitario, 0);

            const procedimentosJSON = encodeURIComponent(JSON.stringify(procedimentosSelecionados));
            const queryString = `?nome=${encodeURIComponent(nomePaciente)}&dentista=${encodeURIComponent(dentistaSelecionado)}&data=${encodeURIComponent(dataRealizacao)}&status=${encodeURIComponent(statusOrcamento)}&valorTotal=${encodeURIComponent(valorTotal)}&procedimentosSelecionados=${procedimentosJSON}`;

            const redirectUrl = `novaPagina.php${queryString}`;

            window.open(redirectUrl, '_blank');
        });
    </script>
</main>

<?php require_once('./footer.php'); ?>
