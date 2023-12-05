<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2 class="mt-5" aria-label="Cadastro de procedimento">Cadastro de Procedimento</h2>
    <form id="registrarProcedimento" action="" aria-label="Formulário de Cadastro de Procedimento" title="Formulário de cadastro de procedimento">
        <div class="mb-3">
            <label for="nome" class="form-label" aria-label="Nome" title="Nome do procedimento">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" aria-required="true" aria-label="Nome" title="Nome do procedimento" placeholder="Digite o nome do procedimento aqui..." required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label" aria-label="Descricao" title="Descricao do procedimento">Descricao:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" aria-required="true" aria-label="Descricao" title="Descricao do procedimento" placeholder="Digite a descricao do procedimento aqui..." required>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label" aria-label="Valor" title="Valor do procedimento">Valor:</label>
            <input type="number" step="0.01" class="form-control" id="valor" name="valor" aria-required="true" aria-label="Valor" title="Valor do procedimento" placeholder="Digite o valor do procedimento aqui..." required>
        </div>
        <div class="mb-3">
            <label for="especialidade" class="form-label" aria-label="Especialidade" title="Especialidade relacionada ao procedimento">Especialidade:</label>
            <input type="text" class="form-control" id="especialidade" name="especialidade" aria-required="true" aria-label="Especialidade" title="Especialidade relacionada ao procedimento" placeholder="Digite a especialidade relacionada ao procedimento aqui..." required>
        </div>
        <div class="mb-3">
            <label for="consultas" class="form-label" aria-label="consultas" title="Consultas do Orçamento">Consultas Necessárias:</label>
            <input type="number" class="form-control" id="consultas" name="consultas" aria-required="true" aria-label="consultas" title="Consultas do Orçamento" placeholder="Consultas do Orçamento" required>
        </div>
        <button type="submit" class="btn btn-primary" aria-label="Cadastrar" title="Enviar formulário">Cadastrar</button>
        <div id="mt-5 mensagem"></div>
    </form>
    <script type="module">
        import {
            handleFormSubmit
        } from './js/index.js';

        handleFormSubmit('registrarProcedimento', '../controllers/ProcedimentoController.php');
    </script>

</main>

<?php require_once('./footer.php'); ?>