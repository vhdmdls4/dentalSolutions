<?php
// FILEPATH: /c:/Users/vhdua/Desktop/dev/dentalSolutions/controllers/ProcedimentoController.php

// Inclua a classe Procedimento para poder utilizá-la

require_once('../global.php');

class ProcedimentoController
{
    public function create()
    {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $tempo = $_POST['tempo'];
        $especialidade = $_POST['especialidade'];

        try {

            $especialidade = Especialidade::getRecordsByField('nome', $especialidade)[0];

            if (empty($descricao)) {
                $descricao = ' ';
            }

            $procedimento = new Procedimento($nome, $descricao, $valor, $tempo, $especialidade);
            $procedimento->save();

            $procedimentoDetails = [
                'nome' => $procedimento->getNome(),
                'descricao' => $procedimento->getDescricao(),
                'valor' => $procedimento->getValorUnitario(),
                'tempo' => $procedimento->getTempoEstimado(),
                'especialidade' => $procedimento->getEspecialidade()
            ];

            echo json_encode(['titulo' => 'Procedimento criado com sucesso', 'conteudo' => $procedimentoDetails]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Erro ao criar procedimento: ' . $e->getMessage()]);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ProcedimentoController();
    $controller->create();
}
