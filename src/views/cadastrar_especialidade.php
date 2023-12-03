<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2 class="mt-5" aria-label="Cadastro de especialidade">Cadastro de Especialidade</h2>
    <form id="registrarEspecialidade" action="" aria-label="Formulário de Cadastro de Especialidade" title="Formulário de cadastro de especialidade">
        <div class="mb-3">
            <label for="nome" class="form-label" aria-label="Nome da especialidade" title="Nome da especialidade">Nome da especialidade:</label>
            <input type="text" class="form-control" id="nome" name="nome" aria-required="true" aria-label="Nome da especialidade" title="Nome da especialidade" placeholder="Digite o nome da especialidade aqui..." required>
        </div>
        <button type="submit" class="btn btn-primary" aria-label="Cadastrar" title="Enviar formulário">Cadastrar</button>
        <div id="mt-5 mensagem"></div>
    </form>
    <script type="module">
        import {
            handleFormSubmit
        } from './js/index.js';

        handleFormSubmit('registrarEspecialidade', '../controllers/EspecialidadeController.php');
    </script>


</main>

<?php require_once('./footer.php'); ?>