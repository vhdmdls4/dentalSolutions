<?php

require_once '../class.Orcamento.php';
require_once '../class.Paciente.php';
require_once '../class.Dentista.php';
require_once '../class.Procedimento.php';
require_once '../class.Pagamento.php';
require_once '../class.Consulta.php';
require_once '../container.php';

class OrcamentoController
{
    public function create()
    {
        // Aqui você pode ajustar o nome do arquivo conforme necessário
        $orcamentosContainer = Container::getInstance('orcamentos.txt');
        $pacientesContainer = Container::getInstance('pacientes.txt');
        $dentistasContainer = Container::getInstance('dentistas.txt');
        // Adicione outros containers conforme necessário

        $pacientes = $pacientesContainer->getObjects();
        $dentistas = $dentistasContainer->getObjects();

        // Recupere os dados do formulário
        $id = $_POST['id'];
        $pacienteId = $_POST['paciente'];
        $dentistaId = $_POST['dentistaResponsavel'];
        $dataOrcamento = new DateTime($_POST['dataOrcamento']);
        $procedimentosData = json_decode($_POST['procedimentos'], true);
        $valorTotal = $_POST['valorTotal'];
        $pagamentoId = $_POST['pagamento'];
        $descricao = $_POST['descricao'];
        $consultasData = $_POST['consultas'];

        // Encontre o paciente e dentista com base nos IDs
        $paciente = $this->findObjectById($pacientes, $pacienteId);
        $dentista = $this->findObjectById($dentistas, $dentistaId);

        try {
            if ($paciente === null || $dentista === null) {
                throw new Exception('Paciente ou Dentista não encontrado.');
            }

            // Crie objetos Procedimento, Pagamento, Consulta conforme necessário
            // Exemplo para procedimentos
            $procedimentos = [];
            foreach ($procedimentosData as $procedimentoData) {
                $procedimento = new Procedimento($procedimentoData['nome'], $procedimentoData['descricao'], $procedimentoData['valor'], $procedimentoData['duracao'], $procedimentoData['especialidade']);
                $realizado = $procedimentoData['realizado'];
                $dataConclusao = new DateTime($procedimentoData['dataConclusao']);
                $procedimentos[] = ['procedimento' => $procedimento, 'realizado' => $realizado, 'dataConclusao' => $dataConclusao];
            }

            // Crie o objeto Pagamento (você precisa implementar a classe Pagamento))
            $pagamento = new Pagamento($_POST['formaPagamento'], $_POST['pago'], new DateTime($_POST['data']), $_POST['valorFaturado']);

            // Crie o objeto Consulta (você precisa implementar a classe Consulta)
            $consulta = new Consulta($_POST['procedimento'], $_POST['paciente'], $_POST['dentistaExecutor'], new DateTime($_POST['data']), new DateTime($_POST['horario']), $_POST['duracao']);

            // Crie o objeto Orcamento
            $orcamento = new Orcamento($id, $paciente, $dentista, $dataOrcamento, $procedimentos, $valorTotal, $pagamento, $descricao, $consultasData);

            // Realize outras operações necessárias, como adicionar o Orcamento a algum container
            // ...

            // Salve o Orcamento e outros objetos relacionados

            $orcamentoDetails = [
                'id' => $orcamento->getId(),
                'paciente' => $orcamento->getPaciente()->getNome(),
                'dentistaResponsavel' => $orcamento->getDentistaResponsavel()->getNome(),
                'dataOrcamento' => $orcamento->getDataOrcamento()->format('Y-m-d'),
                'procedimentos' => $orcamento->getProcedimentos(),
                'valorTotal' => $orcamento->getValorTotal(),
                'pagamento' => $orcamento->getPagamento()->getForma(), // Implemente o método getDetalhes na classe Pagamento
                'descricao' => $orcamento->getDescricao(),
                'consultas' => $orcamento->getConsultas(),
            ];

            $orcamento->save();

            echo json_encode(['titulo' => 'Orçamento criado com sucesso', 'conteudo' => $orcamentoDetails]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Erro ao criar Orçamento: ' . $e->getMessage()]);
        }
    }

    // Função auxiliar para encontrar um objeto por ID em um array
    private function findObjectById($objects, $id)
    {
        foreach ($objects as $object) {
            if ($object->getId() === $id) {
                return $object;
            }
        }
        return null;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orcamentoController = new OrcamentoController();
    $orcamentoController->create();
}
