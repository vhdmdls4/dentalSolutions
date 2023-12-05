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
        $procedimentosDB = Procedimento::getRecords();

        $pacienteCPF = $_POST['pacienteCPF'];
        $dentistaResponsavelCPF = $_POST['dentistaCPF'];
        $dataOrcamento = $_POST['dataOrcamento'];
        $procedimentos = $_POST['procedimentos'];
        $descricao = $_POST['descricao'];

        if ($procedimentos === null) {
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
            $procedimentos === null ||
            $descricao === null
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

        $procedimentoEncontrado = null;

        foreach ($procedimentosDB as $procedimentoLocal) {
            if ($procedimentoLocal->getNome() == $procedimentos) {
                $procedimentoEncontrado = $procedimentoLocal;
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

            if ($procedimentoLocal === null) {
                throw new Exception('Procedimento não encontrado.');
            }

            $orcamento = new Orcamento(
                $pacienteEncontrado,
                $dentistaResponsavelEncontrado,
                new DateTime($dataOrcamento),
                $procedimentos,
                $descricao,
            );
            $orcamento->save();

            $orcamentoDetails = [
                'paciente' => $orcamento->getPaciente()->getNome(),
                'dentistaResponsavel' => $orcamento->getDentistaResponsavel()->getNome(),
                'dataOrcamento' => $orcamento->getDataOrcamento()->format('Y-m-d H:i:s'),
                'procedimentos' => $procedimentos,
                'descricao' => $orcamento->getDescricao(),
            ];

            echo json_encode(['titulo' => 'Orçamento criado com sucesso', 'conteudo' => $orcamentoDetails]);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Erro ao criar orçamento: ' . $e->getMessage()]);
        }
    }

    public function list()
    {
        $orcamentosDB = Orcamento::getRecords();
        $orcamentos = [];

        foreach ($orcamentosDB as $orcamento) {
            $orcamentos[] = [
                'paciente' => $orcamento->getPaciente()->getNome(),
                'dentistaResponsavel' => $orcamento->getDentistaResponsavel()->getNome(),
                'dataOrcamento' => $orcamento->getDataOrcamento()->format('Y-m-d H:i:s'),
                'procedimentos' => $orcamento->getProcedimentos(),
                'descricao' => $orcamento->getDescricao(),
            ];
        }

        echo json_encode($orcamentos);
    }
}

$controller = new OrcamentoController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->create();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->list();
}
