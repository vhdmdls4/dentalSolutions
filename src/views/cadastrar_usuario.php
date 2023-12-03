<?php require_once('./index.php') ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2 class="mt-5" aria-label="Cadastro de usuário">Cadastro de Usuário</h2>
    <form id="registrarUsuario" action="" aria-label="Formulário de Cadastro de Usuario" title="Formulário de cadastro de usuario">
        <div class="mb-3">
            <label for="login" class="form-label">Nome de usuario:</label>
            <input type="text" class="form-control" id="login" name="login" title="Nome de usuario" aria-label="Nome de usuario" aria-placeholder="Digite o nome de usuario" placeholder="Digite o nome de usuario..." required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="text" class="form-control" id="senha" name="senha" title="Senha" aria-label="Senha" aria-placeholder="Digite a senha aqui" placeholder="Digite a senha aqui..." required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" title="E-mail" aria-label="E-mail" aria-placeholder="Digite o email aqui" placeholder="Digite o email aqui..." required>
        </div>
        <div class="mb-3">
            <label for="perfil" class="form-label" aria-label="Perfil" title="Nome do perfil do usuario">Perfil:</label>
            <input type="text" class="form-control" id="perfil" name="perfil" aria-required="true" aria-label="Perfil" title="Perfil do usuario" placeholder="Digite o nome do perfil aqui..." required>
        </div>
        <button type="submit" class="btn btn-primary" aria-label="Cadastrar">Cadastrar</button>
        <div id="mt-5 mensagem"></div>
    </form>
    <script type="module">
        import {
            handleFormSubmit
        } from './js/index.js';

        handleFormSubmit('registrarUsuario', '../controllers/UsuarioController.php');
    </script>
</main>

<?php require_once('./footer.php') ?>