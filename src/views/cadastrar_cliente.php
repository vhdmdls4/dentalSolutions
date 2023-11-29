<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <h2 class="mt-5" aria-label="Cadastro de cliente">Cadastro de Cliente</h2>
  <form id="registrarCliente" action="" aria-label="Formulário de Cadastro de Cliente" title="Formulário de cadastro de cliente">
    <div class="mb-3">
      <label for="nome" class="form-label" aria-label="Nome completo" title="Nome completo do cliente">Nome completo:</label>
      <input type="text" class="form-control" id="nome" name="nome" aria-required="true" aria-label="Nome completo" title="Nome completo do cliente" placeholder="Digite seu nome completo aqui..." required>
    </div>
    <div class="mb-3">
      <label for="rg" class="form-label" aria-label="RG" title="Registro Geral do cliente">RG:</label>
      <input type="text" class="form-control" id="rg" name="rg" aria-required="true" aria-label="RG" title="Registro Geral do cliente" placeholder="Digite seu RG aqui com traços e pontos..." required>
    </div>
    <div class="mb-3">
      <label for="cpf" class="form-label" aria-label="CPF" title="Cadastro de Pessoa Física do cliente">CPF:</label>
      <input type="text" class="form-control" id="cpf" name="cpf" aria-required="true" aria-label="CPF" title="Cadastro de Pessoa Física do cliente" placeholder="Digite seu CPF aqui com traços e pontos..." required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label" aria-label="E-mail" title="Endereço de e-mail do cliente">E-mail:</label>
      <input type="email" class="form-control" id="email" name="email" aria-required="true" aria-label="E-mail" title="Endereço de e-mail do cliente" placeholder="Digite seu e-mail aqui..." required>
    </div>
    <div class="mb-3">
      <label for="telefone" class="form-label" aria-label="Telefone" title="Número de telefone do cliente">Telefone:</label>
      <input type="text" class="form-control" id="telefone" name="telefone" aria-required="true" aria-label="Telefone" title="Número de telefone do cliente" placeholder="Digite seu telefone aqui com o DDD e os nove dígitos..." required>
    </div>
    <button type="submit" class="btn btn-primary" aria-label="Cadastrar" title="Enviar formulário">Cadastrar</button>
    <div id="mt-5 mensagem"></div>
  </form>
  <script type="module">
    import {
      handleFormSubmit
    } from './js/index.js';

    handleFormSubmit('registrarCliente', '../controllers/ClienteController.php');
  </script>


</main>

<?php require_once('./footer.php'); ?>