<?php

require_once '../global.php';

/*$formaPagamento1 = new FormaPagamento(TipoPagamento::Credito, 10, 0.05);
$pagamento1 = new Pagamento($formaPagamento1, false, new DateTime("2023-11-18"), 1000.00);
$formaPagamento1->save();
echo '<hr>';
echo $pagamento1->getForma();
echo '<hr>';

$formaPagamento2 = new FormaPagamento(TipoPagamento::Dinheiro, 1, 0.0);
$pagamento2 = new Pagamento($formaPagamento2, false, new DateTime("2023-11-18"), 1000.00);
$formaPagamento2->save();
echo '<hr>';
echo $pagamento2->getForma();
echo '<hr>';

$formaPagamento3 = new FormaPagamento(TipoPagamento::Pix, 1, 0.0);
$pagamento3 = new Pagamento($formaPagamento3, false, new DateTime("2023-11-18"), 500.00);
$formaPagamento3->save();
echo '<hr>';
echo $pagamento3->getForma();
echo '<hr>';

$formaPagamento4 = new FormaPagamento(TipoPagamento::Debito, 1, 0.01);
$pagamento3 = new Pagamento($formaPagamento3, false, new DateTime("2023-11-18"), 500.00);
$formaPagamento4->save();
echo '<hr>';
echo $pagamento3->getForma();
echo '<hr>';*/

class OrcamentoController
{
    public function create()
    {

        $pacientesDB = Paciente::getRecords();
        $dentistasDB = DentistaParceiro::getRecords();
        $formasPagamentoDB = FormaPagamento::getRecords();
        $procedimentosDB = Procedimento::getRecords();

        $pacienteCPF = $_POST['pacienteCPF'];
        $dentistaResponsavelCPF = $_POST['dentistaCPF'];
        $dataOrcamento = $_POST['dataOrcamento'];
        $tratamentoAprovado = $_POST['tratamentoAprovado'];
        $procedimentos = $_POST['procedimentos'];
        $valorTotal = $_POST['valorTotal'];
        $forma_Pagamento = $_POST['formaPagamento'];
        $descricao = $_POST['descricao'];
        $consultasData = $_POST['consultas'];

        if ($procedimentos === null) {
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
            $procedimentos === null ||
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

        if ($dentistaResponsavelEncontrado === null) {
            $dentistasDB = DentistaFuncionario::getRecords();
            foreach ($dentistasDB as $dentistaLocal) {
                if ($dentistaLocal->getCpf() == $dentistaResponsavelCPF) {
                    $dentistaResponsavelEncontrado = $dentistaLocal;
                    break;
                }
            }
        }

        $formaPagamentoEncontrada = null;

        foreach ($formasPagamentoDB as $formaPagamentoLocal) {
            if ($formaPagamentoLocal->getTipo() == $forma_Pagamento) {
                $formaPagamentoEncontrada = $formaPagamentoLocal;
                break;
            }
        }

        $procedimentoEncontrado = null;

        foreach ($procedimentosDB as $procedimentoLocal) {
            if ($procedimentoLocal->getNome() == $procedimentos) {
                $procedimentoEncontrado = $procedimentoLocal;
                break;
            }
        }

        /*echo $pacienteCPF ."\n";
        echo $dentistaResponsavelCPF ."\n";
        echo $dataOrcamento ."\n";
        echo $tratamentoAprovado ."\n";
        echo $procedimentos ."\n"; 
        echo $valorTotal ."\n";
        echo $forma_Pagamento."\n";
        echo $descricao."\n";
        echo $consultasData."\n";*/

        try {

            if ($pacienteEncontrado === null) {
                throw new Exception('Paciente não encontrado.');
            }

            if ($dentistaResponsavelEncontrado === null) {
                throw new Exception('Dentista Responsável não encontrado.');
            }

            if ($formaPagamentoLocal === null) {
                throw new Exception('Forma de Pagamento ' . $formaPagamentoEncontrada . ' não encontrada.');
            }

            if ($procedimentoLocal === null) {
                throw new Exception('Procedimento não encontrado.');
            }

            /*$pagamento = new Pagamento(
                $formaPagamento,
                $pagamentoData['pago'],
                new DateTime($pagamentoData['data']),
                $pagamentoData['valorFaturado']
            )*/

            var_dump($procedimentos);

            $orcamento = new Orcamento(
                $pacienteEncontrado,
                $dentistaResponsavelEncontrado,
                new DateTime($dataOrcamento),
                $tratamentoAprovado,
                $procedimentos,
                $valorTotal,
                $formaPagamentoLocal,
                $descricao,
                $consultasData
            );
            $orcamento->save();

            /*$orcamentoDetails = [
                'paciente' => (string)$orcamento->getPaciente(),
                'dentistaResponsavel' => (string)$orcamento->getDentistaResponsavel(),
                'dataOrcamento' => $orcamento->getDataOrcamento()->format('Y-m-d H:i:s'),
                'tratamentoAprovado' => $orcamento->getTratamentoAprovado(),
                'procedimentos' => $procedimentos,
                'valorTotal' => $orcamento->getValorTotal(),
                'pagamento' => (string)$orcamento->getPagamento(),
                'descricao' => $orcamento->getDescricao(),
                'consultas' => $orcamento->getConsultas(),
            ];
            
            echo json_encode(['titulo' => 'Orçamento criado com sucesso', 'conteudo' => htmlspecialchars(json_encode($orcamentoDetails))]);*/
        } catch (Exception $e) {
            echo json_encode(['error' => 'Erro ao criar orçamento: ' . $e->getMessage()]);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new OrcamentoController();
    $controller->create();
}
