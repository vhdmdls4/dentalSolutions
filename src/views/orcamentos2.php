<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 2000px;">

  <h2 class="mt-5" aria-label="Criação de Orçamentos">Criação de Orçamentos</h2>
  <form id="criarOrcamento" action="" aria-label="Formulário de Criação de Orçamentos" title="Formulário de Criação de Orçamentos">
  <div class="mb-3">
    <label for="id" class="form-label" aria-label="id" title="id">Nº Orçamento:</label>
    <?php
        $id = sprintf("%04d", rand(1000, 9999));
    ?>
    <input type="number" class="form-control" id="id" name="id" aria-required="true" aria-label="id" title="id do orcamento" placeholder="" value="<?php echo $id; ?>" required>
    </div>
    <div class="mb-3">
        <label for="paciente" class="form-label" aria-label="Paciente" title="Paciente do cliente">Paciente:</label>
        <input type="text" class="form-control" id="paciente" name="paciente" aria-required="true" aria-label="Paciente" title="Paciente do cliente" placeholder="" required>
        </div>
        <div class="mb-3">
        <label for="dentistaResponsavel" class="form-label" aria-label="Dentista Responsável" title="Dentista Responsável">Dentista Responsável:</label>
        <input type="text" class="form-control" id="dentistaResponsavel" name="dentistaResponsavel" aria-required="true" aria-label="Dentista Responsável" title="Dentista Responsável" placeholder="Selecione o Dentista Responsável" required>
        </div>
        <div class="mb-3">
        <label for="dataOrcamento" class="form-label">Data do Orçamento:</label>
        <?php
            date_default_timezone_set('America/Sao_Paulo');
            $dataAtual = date('Y-m-d');
        ?>
        <input type="date" class="form-control" id="dataOrcamento" name="dataOrcamento" min="<?php echo $dataAtual; ?>" required>
    </div>

    <div class="mb-3">
        <label for="tratamentoAprovado" class="form-label">Status do Orçamento:</label>
        <select class="form-control" id="tratamentoAprovado" name="tratamentoAprovado" required>
            <option value="1">Aprovado</option>
            <option value="0">Pendente</option>
            <!-- Adicione outras opções conforme necessário -->
        </select>
    </div>

    <div class="mb-3">
        <label for="procedimentos" class="form-label">Procedimentos:</label>
        <select class="form-control" id="procedimentos" name="procedimentos" required>
            <option value="" selected disabled>Selecione um procedimento</option>
            <option value="extracao">Extração</option>
            <option value="limpeza">Limpeza</option>
            <!-- Outras opções de procedimentos aqui, se necessário -->
        </select>
    </div>


    <div class="mb-3">
        <label for="consultas" class="form-label">Consultas do Orçamento:</label>
        <input type="number" class="form-control" id="consultas" name="consultas" min="0" required>
    </div>
    <button type="submit" class="btn btn-primary" aria-label="Gerar Orçamento" title="Enviar formulário">Gerar Orçamento</button>
    <div id="mt-5 mensagem"></div>
  </form>
  <script type="module">
    import {
      handleFormSubmit
    } from './js/index.js';

    handleFormSubmit('criarOrcamento', '../controllers/OrcamentoController.php');

    export function handleFormSubmit(formId, actionUrl) {
        const form = document.getElementById(formId);

        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            try {
                const formData = new FormData(form);
                const response = await fetch(actionUrl, {
                    method: 'POST',
                    body: formData
                });

                if (response.ok) {
                    const result = await response.json();
                    console.log(result); // Verifique o resultado no console
                } else {
                    console.error('Erro ao enviar formulário');
                }
            } catch (error) {
                console.error('Erro no envio do formulário:', error);
            }
        });
    }
  </script>
</main>


<?php require_once('./footer.php'); ?>