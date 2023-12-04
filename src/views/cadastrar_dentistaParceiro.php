<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 1450px;">

    <h2 class="mt-5">Cadastro de Dentista Parceiro</h2>
    <form id="cadastrarDentistaParceiro" action="" aria-label="Formulário de Cadastro de Dentista Parceiro">
    <div class="mb-3">
      <label for="nome" class="form-label">Nome completo:</label>
      <input type="text" class="form-control" id="nome" name="nome" title="Nome completo" aria-label="Nome completo" aria-placeholder="Digite o nome completo" placeholder="Digite o nome completo..." required>
    </div>

    <div class="mb-3">
      <label for="cro" class="form-label">CRO:</label>
      <input type="text" class="form-control" id="cro" name="cro" title="CRO" aria-label="CRO" aria-placeholder="Digite o CRO" placeholder="Digite o CRO..." required>
    </div>
    
    <div class="mb-3">
      <label for="telefone" class="form-label">Telefone:</label>
      <input type="text" class="form-control" id="telefone" name="telefone" title="Telefone" aria-label="Telefone" aria-placeholder="(Digite aqui o telefone com o DDD e os nove dígitos)" placeholder="Digite aqui o telefone com o DDD e os nove dígitos..." required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">E-mail:</label>
      <input type="email" class="form-control" id="email" name="email" title="E-mail" aria-label="E-mail" aria-placeholder="Digite o email aqui" placeholder="Digite o email aqui..." required>
    </div>

    <div class="mb-3">
      <label for="cpf" class="form-label">CPF:</label>
      <input type="text" class="form-control" id="cpf" name="cpf" title="CPF" aria-label="CPF" aria-placeholder="Digite o CPF com traços e pontos" placeholder="Digite o CPF com traços e pontos..." required>
    </div>

    <fieldset>
    <legend>Endereço</legend>

    <div class="mb-3">
      <label for="rua" class="form-label">Rua:</label>
      <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite o nome da rua" required>
    </div>

    <div class="mb-3">
      <label for="numero" class="form-label">Número:</label>
      <input type="number" class="form-control" id="numero" name="numero" placeholder="Digite o número" required>
    </div>

    <div class="mb-3">
      <label for="complemento" class="form-label">Complemento:</label>
      <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Digite o complemento (opcional)">
    </div>

    <div class="mb-3">
      <label for="bairro" class="form-label">Bairro:</label>
      <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o nome do bairro" required>
    </div>

    <div class="mb-3">
      <label for="cidade" class="form-label">Cidade:</label>
      <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite o nome da cidade" required>
    </div>

    <div class="mb-3">
      <label for="cep" class="form-label">CEP:</label>
      <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o CEP" required>
    </div>

    <div class="mb-3">
      <label for="estado" class="form-label">Estado:</label>
      <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite o nome do estado" required>
    </div>
  </fieldset>

    <div class="mb-3">
      <label for="agenda" class="form-label">Agenda:</label>
      <input type="text" class="form-control" id="agenda" name="agenda" placeholder="Digite o nome do estado" required>
    </div>

    <div class="mb-3">
      <label for="habilitacoes" class="form-label">Habilitações:</label>
      <input type="text" class="form-control" id="habilitacoes" name="habilitacoes" placeholder="Digite as habilitações..." required>
    </div>

    <button type="submit" class="btn btn-primary" aria-label="Cadastrar">Cadastrar</button>
    <div id="mt-5 mensagem"></div>
    </form>

    <script type="module">
      import {
        handleFormSubmit
      } from './js/index.js';

      handleFormSubmit('cadastrarDentistaParceiro', '../controllers/DentistaParceiroController.php');
    </script>
</main>

<?php require_once('./footer.php'); ?>