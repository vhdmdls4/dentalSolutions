<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <h2 class="mt-5">Cadastro de Paciente</h2>
  <form id="registrarPaciente" action="" aria-label="Formulário de Cadastro de Cliente">
    <div class="mb-3">
      <label for="nome" class="form-label">Nome completo:</label>
      <input type="text" class="form-control" id="nome" name="nome" title="Nome completo" aria-label="Nome completo" aria-placeholder="Digite o nome completo" placeholder="Digite o nome completo..." required>
    </div>
    <div class="mb-3">
      <label for="rg" class="form-label">RG:</label>
      <input type="text" class="form-control" id="rg" name="rg" title="RG" aria-label="RG" aria-placeholder="Digite seu RG aqui com traços e pontos" placeholder="Digite seu RG aqui com traços e pontos..." required>
    </div>
    <div class="mb-3">
      <label for="cpf" class="form-label">CPF:</label>
      <input type="text" class="form-control" id="cpf" name="cpf" title="CPF" aria-label="CPF" aria-placeholder="Digite seu CPF com traços e pontos" placeholder="Digite seu CPF com traços e pontos..." required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">E-mail:</label>
      <input type="email" class="form-control" id="email" name="email" title="E-mail" aria-label="E-mail" aria-placeholder="Digite seu email aqui" placeholder="Digite seu email aqui..." required>
    </div>
    <div class="mb-3">
      <label for="telefone" class="form-label">Telefone:</label>
      <input type="text" class="form-control" id="telefone" name="telefone" title="Telefone" aria-label="Telefone" aria-placeholder="(Digite aqui o seu telefone com o DDD e os nove dígitos)" placeholder="Digite aqui o seu telefone com o DDD e os nove dígitos..." required>
    </div>
    <div class="mb-3">
      <label for="dataNascimento" class="form-label">Data de Nascimento</label>
      <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" title="Data de nascimento" aria-label="Data de nascimento" aria-placeholder="" placeholder="" required>
    </div>
    <div class="mb-3">
      <label for="responsavelFinanceiro" class="form-label">Responsável Financeiro</label>
      <input type="text" class="form-control" id="responsavelFinanceiro" name="responsavelFinanceiro" title="Responsável Financeiro" aria-label="Responsável Financeiro" aria-placeholder="Digite aqui o CPF do seu responsável financeiro" placeholder="Digite aqui o CPF do seu responsável financeiro..." required>
    </div>
    <button type="submit" class="btn btn-primary" aria-label="Cadastrar">Cadastrar</button>
    <div id="mt-5 mensagem"></div>
  </form>
  <script type="module">
    import {
      handleFormSubmit
    } from './js/index.js';

    handleFormSubmit('registrarPaciente', '../controllers/PacienteController.php');
  </script>
</main>

<?php require_once('./footer.php'); ?>