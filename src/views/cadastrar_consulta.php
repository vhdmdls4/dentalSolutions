<?php require_once('./index.php'); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2 class="mt-5">Cadastro de Consulta</h2>
    <form id="registrarConsulta" action="" aria-label="Formulário de Cadastro de Cliente">
        <div class="mb-3">
            <label for="procedimento" class="form-label">Procedimento:</label>
            <input type="text" class="form-control" id="procedimento" name="procedimento" title="Nome do procedimento" aria-label="Nome do procedimento" aria-placeholder="Digite o nome do procedimento" placeholder="Digite o nome do procedimento..." required>
        </div>
        <div class="mb-3">
            <label for="paciente" class="form-label">CPF do paciente:</label>
            <input type="text" class="form-control" id="paciente" name="paciente" title="CPF do paciente" aria-label="CPF do paciente" aria-placeholder="Digite o CPF do paciente" placeholder="Digite o CPF do paciente com traços e pontos..." required>
        </div>
        <div class="mb-3">
            <label for="dentista" class="form-label">CPF do dentista executor:</label>
            <input type="text" class="form-control" id="dentista" name="dentista" title="CPF do dentista executor" aria-label="CPF do dentista executor" aria-placeholder="Digite o CPF do dentista executor" placeholder="Digite o CPF do dentista executor com traços e pontos..." required>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" class="form-control" id="data" name="data" title="Data" aria-label="Data" aria-placeholder="" placeholder="" required>
        </div>
        <div class="mb-3">
            <label for="horario" class="form-label">Horario:</label>
            <input type="time" class="form-control" id="horario" name="horario" title="Horario" aria-label="Horario" aria-placeholder="Digite o horario da consulta" placeholder="Digite o horario da consulta..." required>
        </div>
        <div class="mb-3">
            <label for="duracao" class="form-label">Duracao:</label>
            <input type="number" class="form-control" id="duracao" name="duracao" title="Duracao" aria-label="Duracao" aria-placeholder="Digite o tempo de duracao da consulta" placeholder="Digite o tempo de duracao da consulta em minutos..." required>
        </div>
        <div class="mb-3">
            <label for="dataOrcamento" class="form-label">Data do orcamento:</label>
            <input type="date" class="form-control" id="dataOrcamento" name="dataOrcamento" title="Data do orcamento" aria-label="Data do orcamento" aria-placeholder="" placeholder="" required>
        </div>
        <button type="submit" class="btn btn-primary" aria-label="Cadastrar">Cadastrar</button>
        <div id="mt-5 mensagem"></div>
    </form>
    <script type="module">
        import {
            handleFormSubmit
        } from './js/index.js';

        handleFormSubmit('registrarConsulta', '../controllers/ConsultaController.php');
    </script>
</main>

<?php require_once('./footer.php'); ?>