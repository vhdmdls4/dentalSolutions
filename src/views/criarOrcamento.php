<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 2000px;">

  <h2 class="mt-5" aria-label="Criação de Orçamentos">Criação de Orçamentos</h2>
  <form id="criarOrcamento" action="" aria-label="Formulário de Criação de Orçamentos" title="Formulário de Criação de Orçamentos">
   <div class="mb-3">
      <label for="pacienteCPF" class="form-label" aria-label="Paciente" title="Paciente do cliente">CPF do Paciente:</label>
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
        <select class="form-select" id="tratamentoAprovado" name="tratamentoAprovado" aria-required="true" aria-label="Status de Aprovação do Orçamento" title="Status de Aprovação do Orçamento" required>
            <option value="0">Pendente</option>
            <option value="1" disabled>Aprovado</option>
        </select>
    </div>

<div class="mb-3">
  <label for="procedimentos" class="form-label" aria-label="procedimento" title="Número de procedimento do cliente">Procedimentos:</label>
  <div id="procedimentos-container">
    <div class="input-group mb-3 procedimento-item">
      <select class="form-select procedimento-select" aria-label="Procedimento" required name="procedimentos">
        <option value="" disabled selected>Selecione um Procedimento</option>
        <?php
          $procedures = [
            'Limpeza Geral' => 50.00,
            'Extração' => 80.00 
          ];

          foreach ($procedures as $procedure => $value) {
            echo "<option value=\"$procedure\" data-value=\"$value\">$procedure - R$ $value</option>";
          }
        ?>
      </select>
      <span class="input-group-text">Quantidade:</span>
      <input type="number" class="form-control quantidade" aria-label="Quantidade" placeholder="Quantidade" required min="1">
      <button class="btn btn-danger remove-procedimento" type="button" style="display:none;" disabled>Remover</button>
    </div>
  </div>
  <button class="btn btn-success" type="button" id="add-procedimento">Adicionar Procedimento</button>
</div>

<div class="mb-3">
  <label for="valorTotal" class="form-label" aria-label="valorTotal" title="Valor Total do Orçamento">Valor Total do Orçamento:</label>
  <input type="number" class="form-control" id="valorTotal" name="valorTotal" aria-required="true" aria-label="valorTotal" title="Valor Total do Orçamento" placeholder="R$" required step="any" pattern="\d+(\.\d+)?" title="Insira um número decimal válido" readonly>
</div>


    <div class="mb-3">
      <label for="formaPagamento" class="form-label" aria-label="formaPagamento" title="Forma de Pagamento">Forma de Pagamento:</label>
      <select class="form-select" id="formaPagamento" name="formaPagamento" aria-required="true" aria-label="formaPagamento" title="Forma de Pagamento" required>
        <option value="" disabled selected>Selecione a Forma de Pagamento</option>
        <option value="Debito">Débito</option>
        <option value="Dinheiro">Dinheiro</option>
        <option value="Credito">Crédito</option>
        <option value="Pix">Pix</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="descricao" class="form-label" aria-label="descricao" title="Descrição do Orçamento">Descrição do Orçamento:</label>
      <input type="text" class="form-control" id="descricao" name="descricao" aria-required="true" aria-label="descricao" title="Descrição do Orçamento" placeholder="Descrição do Orçamento" required>
    </div>
    <div class="mb-3">
      <label for="consultas" class="form-label" aria-label="consultas" title="Consultas do Orçamento">Consultas Necessárias:</label>
      <input type="number" class="form-control" id="consultas" name="consultas" aria-required="true" aria-label="consultas" title="Consultas do Orçamento" placeholder="Consultas do Orçamento" required>
    </div>
    <button type="submit" class="btn btn-primary" aria-label="Gerar Orçamento" title="Enviar formulário">Gerar Orçamento</button>
    <div id="mt-5 mensagem"></div>
  </form>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script type="module">
    import {
      handleFormSubmit
    } from './js/index.js';

    handleFormSubmit('criarOrcamento', '../controllers/OrcamentoController.php');

  $(document).ready(function () {
    // Adicionar procedimento
    $('#add-procedimento').on('click', function () {
      var procedimentoClone = $('.procedimento-item:first').clone();
      procedimentoClone.find('.procedimento-select').val('');
      procedimentoClone.find('.quantidade').val('');
      procedimentoClone.find('.remove-procedimento').show().prop('disabled', false);
      $('#procedimentos-container').append(procedimentoClone);
    });

    // Remover procedimento
    $('#procedimentos-container').on('click', '.remove-procedimento', function () {
      if ($(this).closest('.procedimento-item').index() !== 0) {
        $(this).closest('.procedimento-item').remove();
        calcularTotal();
      }
    });

    // Atualizar o valor total quando há mudanças
    $('#procedimentos-container').on('change', '.procedimento-select, .quantidade', function () {
      calcularTotal();
    });

    function calcularTotal() {
      var totalValue = 0;

      $('.procedimento-item').each(function () {
        var procedureValue = $('option:selected', $(this).find('.procedimento-select')).data('value');
        var quantity = $(this).find('.quantidade').val();
        totalValue += procedureValue * quantity;
      });

      $('#valorTotal').val(totalValue.toFixed(2));
    }
  });
  </script>
</main>

<?php require_once('./footer.php'); ?>