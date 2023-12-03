<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <h2 class="mt-5">Cadastro de Procedimento</h2>
  <form id="cadastrarProcedimento" action="" aria-label="Formulário de Cadastro de Procedimento">
    <div class="mb-3">
      <label for="procedimento" class="form-label">Procedimento:</label>
      <input type="text" class="form-control" id="procedimento" name="procedimento" aria-label="Procedimento" required>
    </div>
    <div class="mb-3">
      <label for="valor" class="form-label">Valor:</label>
      <div class="input-group">
        <span class="input-group-text">R$</span>
        <input type="text" class="form-control" id="valor" name="valor" aria-label="Valor" required>
      </div>
    </div>
    <div class="mb-3">
      <label for="duracao" class="form-label">Duração do Procedimento (em minutos):</label>
      <input type="text" class="form-control" id="duracao" name="duracao" aria-label="Duracao" required>
    </div>
    <div class="mb-3">
      <label for="especialidade" class="form-label">Especialidade:</label>
      <select class="form-select" id="especialidade" name="especialidade" aria-label="Especialidade" required>
        <option value="Gelra">Geral</option>
        <option value="Odontopediatria">Odontopediatria</option>
        <option value="Ortodontia">Ortodontia</option>
        <!-- Adicionar mais opções conforme necessário ou receber da classe Especialidade -->
      </select>
    </div>
    <button type="submit" class="btn btn-primary" aria-label="Cadastrar">Cadastrar</button>
    <div id="mt-5 mensagem"></div>
  </form>
  <script type="module">
    import {
      handleFormSubmit
    } from './js/index.js';

    handleFormSubmit('registrarCliente', '../controllers/ProcedimentoController.php');
  </script>

</main>

<?php require_once('./footer.php'); ?>