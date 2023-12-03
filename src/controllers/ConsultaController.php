<?php
// FILEPATH: /c:/Users/vhdua/Desktop/dev/dentalSolutions/controllers/ConsultaController.php

// Inclua a classe Consulta para poder utilizá-la
require_once('../global.php');

class ConsultaController
{
    public function create()
    {
        $nomeProcedimento = $_POST['procedimento'];
        $cpfPaciente = $_POST['paciente'];
        $cpfDentista = $_POST['dentista'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $duracao = $_POST['duracao'];
        $dataOrcamento = $_POST['dataOrcamento'];

        $procedimento = Procedimento::getRecordsByField('nome', $nomeProcedimento)[0];
        $paciente = Paciente::getRecordsByField('CPF', $cpfPaciente)[0];
        $dentista = DentistaFuncionario::getRecordsByField('CPF', $cpfDentista)[0];

        if ($dentista === null) {
            $dentista = DentistaParceiro::getRecordsByField('CPF', $cpfDentista)[0];
        }

        $orcamentoArray = Orcamento::getRecordsByField('paciente', $paciente);
        $orcamentoDesejado = null;
        foreach ($orcamentoArray as $orcamento) {
            if ($orcamento->getDataOrcamento() == $dataOrcamento) {
                $orcamentoDesejado = $orcamento;
                break;
            }
        }



        try {
            if ($procedimento === null) {
                throw new Exception('Procedimento não encontrado.');
            }
            if ($paciente === null) {
                throw new Exception('Paciente não encontrado.');
            }
            if ($dentista === null) {
                throw new Exception('Dentista não encontrado.');
            }
            if (!in_array($procedimento->getEspecialidade(), $dentista->getEspecialidades())) {
                throw new Exception('Dentista precisa ter a especialidade ' . $procedimento->getEspecialidade()->getNome() . ' para realizar este procedimento.');
            }
            if (!$dentista->getAgenda()->disponibilidade($data, $horario, $duracao)) {
                throw new Exception('Dentista não está disponível neste horário.');
            }
            if ($orcamentoDesejado === null) {
                throw new Exception('Orcamento não encontrado.');
            }

            $consulta = new Consulta($procedimento, $paciente, $dentista, $data, $horario, $duracao);
            $consulta->save();

            $consultaDetails = [
                'procedimento' => $consulta->getProcedimento(),
                'paciente' => $consulta->getPaciente(),
                'dentista executor' => $consulta->getDentistaExecutor(),
                'data' => $consulta->getData()->format('d/m/y'),
                'horario' => $consulta->getHorario()->format('H:i'),
                'duracao' => $consulta->getDuracao(),
            ];

            echo json_encode(['titulo' => 'Consulta criado com sucesso', 'conteudo' => $consultaDetails]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Erro ao criar consulta: ' . $e->getMessage()]);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ConsultaController();
    $controller->create();
}
