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
        $stringData = $_POST['data'];
        $stringHorario = $_POST['horario'];
        $duracao = $_POST['duracao'];
        $dataOrcamentoString = $_POST['dataOrcamento'];

        $procedimentoEncontrado = null;
        $pacienteEncontrado = null;
        $dentistaEncontrado = null;
        $orcamentoEncontrado = null;
        $data = DateTime::createFromFormat('Y-m-d', $stringData);
        $horario = DateTime::createFromFormat('H:i', $stringHorario);

        foreach (Procedimento::getRecords() as $procedimentoLocal) {
            if ($procedimentoLocal->getNome() == $nomeProcedimento) {
                $procedimentoEncontrado = $procedimentoLocal;
                break;
            }
        }

        foreach (Paciente::getRecords() as $pacienteLocal) {
            if ($pacienteLocal->getCPF() == $cpfPaciente) {
                $pacienteEncontrado = $pacienteLocal;
                break;
            }
        }

        foreach (DentistaFuncionario::getRecords() as $dentistaLocal) {
            if ($dentistaLocal->getCPF() == $cpfDentista) {
                $dentistaEncontrado = $dentistaLocal;
                break;
            }
        }

        if ($dentistaEncontrado === null) {
            foreach (DentistaParceiro::getRecords() as $dentistaLocal) {
                if ($dentistaLocal->getCPF() == $cpfDentista) {
                    $dentistaEncontrado = $dentistaLocal;
                    break;
                }
            }
        }

        foreach (Orcamento::getRecords() as $orcamentoLocal) {
            if ($orcamentoLocal->getDataOrcamento()->format('Y-m-d') == $dataOrcamentoString) {
                $orcamentoEncontrado = $orcamentoLocal;
                break;
            }
        }

        try {

            if ($procedimentoEncontrado === null) {
                throw new Exception('Procedimento não encontrado.');
            }
            if ($pacienteEncontrado === null) {
                throw new Exception('Paciente não encontrado.');
            }
            if ($dentistaEncontrado === null) {
                throw new Exception('Dentista não encontrado.');
            }
            if (!in_array($procedimentoEncontrado->getEspecialidade(), $dentistaEncontrado->getEspecialidades())) {
                throw new Exception('Dentista nao possui especialidade para realizar este procedimento.');
            }
            if (!$dentistaEncontrado->getAgenda()->disponibilidade($data, $horario, $duracao)) {
                throw new Exception('Dentista não está disponível neste horário.');
            }
            if ($orcamentoEncontrado === null) {
                throw new Exception('Orcamento não encontrado.');
            }

            $consulta = new Consulta($procedimentoEncontrado, $pacienteEncontrado, $dentistaEncontrado, $data, $horario, $duracao);
            $consulta->save();

            $orcamentoEncontrado->addConsulta($consulta);
            $orcamentoEncontrado->save();

            $dentistaEncontrado->getAgenda()->marcarConsulta($consulta);
            $dentistaEncontrado->save();

            $consultaDetails = [
                'procedimento' => $consulta->getProcedimento()->getNome(),
                'paciente' => $consulta->getPaciente()->getNome(),
                'dentista executor' => $consulta->getDentistaExecutor()->getNome(),
                'data' => $consulta->getData()->format('d/m/y'),
                'horario' => $consulta->getHorario()->format('H:i'),
                'duracao' => strval($consulta->getDuracao()),
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
