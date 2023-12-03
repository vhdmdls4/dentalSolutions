<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 2000px;">

  <h2 class="mt-5" aria-label="Criação de Orçamentos">Criação de Orçamentos</h2>
  <form id="criarOrcamento" action="" aria-label="Formulário de Criação de Orçamentos" title="Formulário de Criação de Orçamentos">
   <div class="mb-3">
      <label for="pacienteCPF" class="form-label" aria-label="Paciente" title="Paciente do cliente">CPF do Cliente:</label>
      <input type="text" class="form-control" id="pacienteCPF" name="pacienteCPF" aria-required="true" aria-label="pacienteCPF" title="CPF do Paciente" placeholder="" required>
    </div>
    <div class="mb-3">
      <label for="dentistaCPF" class="form-label" aria-label="Dentista Responsável" title="Dentista Responsável">CPF do Dentista:</label>
      <input type="text" class="form-control" id="dentistaCPF" name="dentistaCPF" aria-required="true" aria-label="Dentista Responsável" title="Dentista Responsável" placeholder="" required>
    </div>
    <div class="mb-3">
        <label for="dataOrcamento" class="form-label" aria-label="dataOrcamento" title="Data do Orçamento">Data do Orçamento:</label>
        <?php
            date_default_timezone_set('America/Sao_Paulo');
            $dataAtual = date('Y-m-d');
        ?>
        <input type="date" class="form-control" id="dataOrcamento" name="dataOrcamento" aria-required="true" aria-label="dataOrcamento" title="Data do Orçamento" placeholder="Data do Orçamento" value="<?php echo $dataAtual; ?>" required>
    </div>
    <div class="mb-3">
        <label for="tratamentoAprovado" class="form-label" aria-label="E-mail" title="Status do Orçamento">Status do Orçamento</label>
        <select class="form-control" id="tratamentoAprovado" name="tratamentoAprovado" aria-required="true" aria-label="Status de Aprovação do Orçamento" title="Status de Aprovação do Orçamento" required>
            <option value="0">Pendente</option>
            <option value="1">Aprovado</option>
        </select>
    </div>
    <div class="mb-3">
      <label for="procedimentos" class="form-label" aria-label="procedimento" title="Número de procedimento do cliente">Procedimentos:</label>
      <input type="text" class="form-control" id="procedimentos" name="procedimentos" aria-required="true" aria-label="procedimentos" title="Procedimentos" placeholder="Selecione os Procedimentos" required>
    </div>
    <div class="mb-3">
      <label for="valorTotal" class="form-label" aria-label="valorTotal" title="Valor Total do Orçamento">Valor Total do Orçamento:</label>
      <input type="number" class="form-control" id="valorTotal" name="valorTotal" aria-required="true" aria-label="valorTotal" title="Valor Total do Orçamento" placeholder="Valor Total do Orçamento" required>
    </div>
    <div class="mb-3">
      <label for="pagamento" class="form-label" aria-label="pagamento" title="Forma de Pagamento">Forma de Pagamento:</label>
      <input type="text" class="form-control" id="pagamento" name="pagamento" aria-required="true" aria-label="pagamento" title="Forma de Pagamento" placeholder="Selecione a Forma de Pagamento" required>
    </div>
    <div class="mb-3">
      <label for="descricao" class="form-label" aria-label="descricao" title="Descrição do Orçamento">Descrição do Orçamento:</label>
      <input type="text" class="form-control" id="descricao" name="descricao" aria-required="true" aria-label="descricao" title="Descrição do Orçamento" placeholder="Descrição do Orçamento" required>
    </div>
    <div class="mb-3">
      <label for="consultas" class="form-label" aria-label="consultas" title="Consultas do Orçamento">Consultas do Orçamento:</label>
      <input type="number" class="form-control" id="consultas" name="consultas" aria-required="true" aria-label="consultas" title="Consultas do Orçamento" placeholder="Consultas do Orçamento" required>
    </div>
    <button type="submit" class="btn btn-primary" aria-label="Gerar Orçamento" title="Enviar formulário">Gerar Orçamento</button>
    <div id="mt-5 mensagem"></div>
  </form>
  <script type="module">
    import {
      handleFormSubmit
    } from './js/index.js';

    handleFormSubmit('criarOrcamento', '../controllers/OrcamentoController.php');
  </script>
</main>

<?php require_once('./footer.php'); ?>