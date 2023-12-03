<?php

require_once '../global.php';

class OrcamentoController
{
    public function create()
    {
        
        $pacientesDB = Paciente::getRecords();
        $dentistasDB = DentistaParceiro::getRecords();

        $pacienteCPF = $_POST['pacienteCPF'];
        $dentistaResponsavelCPF = $_POST['dentistaCPF'];
        $dataOrcamento = $_POST['dataOrcamento'];
        $tratamentoAprovado = $_POST['tratamentoAprovado'];
        $procedimentosData = isset($_POST['procedimentos']) ? filter_input(INPUT_POST, 'procedimentos', FILTER_DEFAULT) : null;
        $valorTotal = $_POST['valorTotal'];
        $pagamentoData = $_POST['pagamento'];
        $descricao = $_POST['descricao'];
        $consultasData = $_POST['consultas'];

        if ($procedimentosData === null) {
            echo json_encode(['error' => 'O campo "procedimentos" não foi enviado ou está vazio.']);
            exit;
        }

        if ($dentistaResponsavelCPF === null) {
            echo json_encode(['error' => 'O campo "dentistaResponsavel" não foi enviado ou está vazio.']);
            exit;
        }

        if (
            $pacienteCPF === null ||
            $dentistaResponsavelCPF === null ||
            $dataOrcamento === null ||
            $tratamentoAprovado === null ||
            $procedimentosData === null ||
            $valorTotal === null ||
            $pagamentoData === null ||
            $descricao === null ||
            $consultasData === null
        ) {
            echo json_encode(['error' => 'Dados do formulário estão incompletos ou inválidos.']);
            exit;
        }

        $pacienteEncontrado = null;

        foreach ($pacientesDB as $pacienteLocal) {
            if ($pacienteLocal->getCpf() == $pacienteCPF) {
            $pacienteEncontrado = $pacienteLocal;
              break;
            }
        }

        $dentistaResponsavelEncontrado = null;

        foreach ($dentistasDB as $dentistaLocal) {
            if ($dentistaLocal->getCpf() == $dentistaResponsavelCPF) {
                $dentistaResponsavelEncontrado = $dentistaLocal;
                  break;
                }
        }

        try {

            if ($pacienteEncontrado === null) {
                throw new Exception('Paciente não encontrado.');
            }

            if ($dentistaResponsavelEncontrado === null) {
                throw new Exception('Dentista Responsável não encontrado.');
            }

            $tipoPagamento = TipoPagamento::Dinheiro;

            $formaPagamento = new FormaPagamento(
                $tipoPagamento,
                $pagamentoData['parcelas'],
                $pagamentoData['operadora'],
                $pagamentoData['taxa']
            );

            $pagamento = new Pagamento(
                $formaPagamento,
                $pagamentoData['pago'],
                new DateTime($pagamentoData['data']),
                $pagamentoData['valorFaturado']
            );

            $orcamento = new Orcamento(
                $pacienteCPF,
                $dentistaResponsavelCPF,
                $dataOrcamento,
                $tratamentoAprovado,
                $procedimentosData,
                $valorTotal,
                $pagamento,
                $descricao,
                $consultasData
            );
            $orcamento->save();

            $orcamentoDetails = [
                'paciente' => (string)$orcamento->getPaciente(),
                'dentistaResponsavel' => (string)$orcamento->getDentistaResponsavel(),
                'dataOrcamento' => $orcamento->getDataOrcamento()->format('Y-m-d H:i:s'),
                'tratamentoAprovado' => $orcamento->getTratamentoAprovado(),
                'procedimentos' => $procedimentosData,
                'valorTotal' => $orcamento->getValorTotal(),
                'pagamento' => (string)$orcamento->getPagamento(),
                'descricao' => $orcamento->getDescricao(),
                'consultas' => $orcamento->getConsultas(),
            ];
            
            echo json_encode(['titulo' => 'Orçamento criado com sucesso', 'conteudo' => htmlspecialchars(json_encode($orcamentoDetails))]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Erro ao criar orçamento: ' . $e->getMessage()]);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new OrcamentoController();
    $controller->create();
}
