<?php

require_once '../global.php';

$formaPagamento1 = new FormaPagamento(TipoPagamento::Credito, 10, 0.05);
$pagamento1 = new Pagamento($formaPagamento1, false, new DateTime("2023-11-18"), 1000.00);
var_dump ($formaPagamento1->getTipo());
echo '<hr>';
echo $pagamento1->getForma();
echo '<hr>';

$formaPagamento2 = new FormaPagamento(TipoPagamento::Dinheiro, 1, 0.0);
$pagamento2 = new Pagamento($formaPagamento2, false, new DateTime("2023-11-18"), 1000.00);
var_dump ($formaPagamento2->getTipo());
echo '<hr>';
echo $pagamento2->getForma();
echo '<hr>';

$formaPagamento3 = new FormaPagamento(TipoPagamento::Pix, 1, 0.0);
$pagamento3 = new Pagamento($formaPagamento3, false, new DateTime("2023-11-18"), 500.00);
var_dump ($formaPagamento3->getTipo());
echo '<hr>';
echo $pagamento3->getForma();
echo '<hr>';

$formaPagamento3 = new FormaPagamento(TipoPagamento::Debito, 1, 0.01);
$pagamento3 = new Pagamento($formaPagamento3, false, new DateTime("2023-11-18"), 500.00);
var_dump ($formaPagamento3->getTipo());
echo '<hr>';
echo $pagamento3->getForma();
echo '<hr>';

class OrcamentoController
{
    public function create()
    {
        
        $pacientesDB = Paciente::getRecords();
        $dentistasDB = DentistaParceiro::getRecords();
        $formasPagamentoDB = FormaPagamento::getRecords();

        $pacienteCPF = $_POST['pacienteCPF'];
        $dentistaResponsavelCPF = $_POST['dentistaCPF'];
        $dataOrcamento = $_POST['dataOrcamento'];
        $tratamentoAprovado = $_POST['tratamentoAprovado'];
        $procedimentosData = isset($_POST['procedimentos']) ? filter_input(INPUT_POST, 'procedimentos', FILTER_DEFAULT) : null;
        $valorTotal = $_POST['valorTotal'];
        $forma_Pagamento = $_POST['pagamento'];
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

        if ($forma_Pagamento === null) {
            echo json_encode(['error' => 'O campo "formaPagamento" não foi enviado ou está vazio.']);
            exit;
        }

        if (
            $pacienteCPF === null ||
            $dentistaResponsavelCPF === null ||
            $dataOrcamento === null ||
            $tratamentoAprovado === null ||
            $procedimentosData === null ||
            $valorTotal === null ||
            $forma_Pagamento === null ||
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

        $formaPagamentoEncontrada = null;

        foreach ($formasPagamentoDB as $formaPagamentoLocal) {
            if ($formaPagamentoLocal->getForma() == $forma_Pagamento) {
                $formaPagamentoEncontrada = $formaPagamentoLocal;
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

            if ($formaPagamentoEncontrada === null) {
                throw new Exception('Forma de Pagamento não encontrada.');
            }

            /*$pagamento = new Pagamento(
                $formaPagamento,
                $pagamentoData['pago'],
                new DateTime($pagamentoData['data']),
                $pagamentoData['valorFaturado']
            );*/

            $orcamento = new Orcamento(
                $pacienteCPF,
                $dentistaResponsavelCPF,
                $dataOrcamento,
                $tratamentoAprovado,
                $procedimentosData,
                $valorTotal,
                $forma_Pagamento,
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
