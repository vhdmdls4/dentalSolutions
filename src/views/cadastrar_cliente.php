<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <h2 class="mt-5">Cadastro de Cliente</h2>
  <form id="registerClient" action="" method="post" aria-label="Formulário de Cadastro de Cliente">
    <div class="mb-3">
      <label for="nome" class="form-label">Nome completo:</label>
      <input type="text" class="form-control" id="nome" name="nome" aria-label="Nome completo" required>
    </div>
    <div class="mb-3">
      <label for="rg" class="form-label">RG:</label>
      <input type="text" class="form-control" id="rg" name="rg" aria-label="RG" required>
    </div>
    <div class="mb-3">
      <label for="cpf" class="form-label">CPF:</label>
      <input type="text" class="form-control" id="cpf" name="cpf" aria-label="CPF" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">E-mail:</label>
      <input type="email" class="form-control" id="email" name="email" aria-label="E-mail" required>
    </div>
    <div class="mb-3">
      <label for="telefone" class="form-label">Telefone:</label>
      <input type="text" class="form-control" id="telefone" name="telefone" aria-label="Telefone" required>
    </div>
    <button type="submit" class="btn btn-primary" aria-label="Cadastrar">Cadastrar</button>
    <div id="mt-5 mensagem"></div>
  </form>

</main>

<?php require_once('./footer.php'); ?>