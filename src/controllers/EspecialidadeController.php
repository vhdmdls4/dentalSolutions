<?php
// FILEPATH: /c:/Users/vhdua/Desktop/dev/dentalSolutions/controllers/EspecialidadeController.php

// Inclua a classe Especialidade para poder utilizá-la
require_once('../global.php');

class EspecialidadeController
{
    public function create()
    {
        $nomeEntrada = $_POST['nome'];
        $nome = trim($nomeEntrada);
        $nome = strtolower($nome);
        $procuraEspecialidade = Especialidade::getRecordsByField('nome', $nome)[0];

        try {
            if ($procuraEspecialidade !== null) {
                throw new Exception('Especialidade já existe.');
            }

            $especialidade = new Especialidade($nome);
            $especialidade->save();

            $especialidadeDetails = [
                'nome' => $especialidade->getNome(),
            ];

            echo json_encode(['titulo' => 'Especialidade criado com sucesso', 'conteudo' => $especialidadeDetails]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Erro ao criar especialidade: ' . $e->getMessage()]);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new EspecialidadeController();
    $controller->create();
}
