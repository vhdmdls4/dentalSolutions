<?php

require_once 'class.controleAcesso.php';
require_once 'class.Funcionalidade.php';
require_once 'testesExtra.php';
require_once('global.php');

/*---------------------------------------------------ROTERIO DE TESTES------------------------------------------------------------*/
//TESTE1
/*O fato de ter que passar pela tela de login e la ter checagem se o usuario possui login ou nao, ele nem conseguira entrar no sistema sem estar logado! (Caso entre no sistema, quer dizer que esta logado!)

/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/

//TESTE2
$perfil_teste = new Perfil('Teste', [$alterar_procedimento, $cadastrar_consulta, $alterar_consulta, $cadastrar_cliente, $alterar_cliente, $cadastrar_usuario, $alterar_usuario, $cadastrar_orcamento, $alterar_orcamento, $cadastrar_paciente, $alterar_paciente, $cadastrar_especialidade, $alterar_especialidade, $cadastrar_profissional, $alterar_profissional, $cadastrar_funcionario, $alterar_funcionario, $entrar, $sair]);
$usuario_teste = new Usuario('teste', 'teste123', 'testedef@dentalsolutions.com', $perfil_teste);

$login_teste = Login::getInstance();
$login_teste->logar($usuario_teste);

// Pelo fato de termos Front, os dados que sao passados na criacao do procedimento sao puxados do input do proprio usuario, portanto, serao usado valores ja criados neste arquivo anteriormente

if(verificaPermissao($login_teste->getUsuarioLogado(), $cadastrar_procedimento)){
    $procedimento_teste = new Procedimento('Retirada de dentes', 'Cirurgia para retirada de todos os dentes superiores para implante', 200, $especialidade1);
}

$login_teste->deslogar();

/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/

//TESTE3
$usuario_teste2 = new Usuario('teste2', 'teste123', 'teste123@dentalsolutions.com', $perfil4);

$login_teste2= Login::getInstance();
$login_teste2->logar($usuario_teste2);

//essa verificacao existe nos controllers de cada classe (so possivel ser utilizado caso tenha importacao de dados do front)
if(verificaPermissao($login_teste->getUsuarioLogado(), $cadastrar_especialidade)){
    $especialidade_teste_clinicoGeral = new Especialidade('Clinico Geral');
    $especialidade_teste_endodontia = new Especialidade('Endodontia');
    $especialidade_teste_cirurgia = new Especialidade('Cirurgia');
    $especialidade_teste_estetica = new Especialidade('Estetica');
}

//essa verificacao existe nos controllers de cada classe (so possivel ser utilizado caso tenha importacao de dados do front)
if(verificaPermissao($login_teste->getUsuarioLogado(), $cadastrar_procedimento)){

    //procedimentos Clinico Geral
    $procedimento_teste_limpeza = new Procedimento('Limpeza','', 200, $especialidade_teste_clinicoGeral);
    $procedimento_teste_restauracao = new Procedimento('Restauracao', '', 185, $especialidade_teste_clinicoGeral);
    $procedimento_teste_extracao = new Procedimento('Extracao Comum', '', 280, $especialidade_teste_clinicoGeral);

    //procedimentos Edodontia
    $procedimento_teste_canal = new Procedimento('Canal', '', 800, $especialidade_teste_endodontia);

    //procedimentos Cirurgia
    $procedimento_teste_siso = new Procedimento('Extracao de Siso', 'Valor pode dente', 400, $especialidade_teste_cirurgia);

    //procedimentos Estetica
    $procedimento_teste_clareamentoLaser = new Procedimento('Clareamento a laser', '', 1700, $especialidade_teste_estetica);
    $procedimento_teste_clareamentoMoldeira = new Procedimento('Clareamento de moldeira','', 900, $especialidade_teste_estetica);
}

/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/

//TESTE 4
$formaPagamento_teste_dinheiro = new FormaPagamento(TipoPagamento::Dinheiro, 1, "", 0);
$formaPagamento_teste_pix = new FormaPagamento(TipoPagamento::Pix, 1, "", 0);
$formaPagamento_teste_debito = new FormaPagamento(TipoPagamento::Debito, 1, "", 0.03);
$formaPagamento_teste_credito_1x = new FormaPagamento(TipoPagamento::Credito, 1, "", 0.04);
$formaPagamento_teste_credito_2x = new FormaPagamento(TipoPagamento::Credito, 2, "", 0.04);
$formaPagamento_teste_credito_3x = new FormaPagamento(TipoPagamento::Credito, 3, "", 0.04);
$formaPagamento_teste_credito_4x = new FormaPagamento(TipoPagamento::Credito, 4, "", 0.07);
$formaPagamento_teste_credito_5x = new FormaPagamento(TipoPagamento::Credito, 5, "", 0.07);
$formaPagamento_teste_credito_6x = new FormaPagamento(TipoPagamento::Credito, 6, "", 0.07);
$aliquota = 0.2;

/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/

//TESTE 5

$mes_novembro = new DateTime('2023-11');

$agenda1_teste = new Agenda('8:00-17:00','8:00-17:00','8:00-17:00','8:00-17:00','8:00-17:00');
$agenda1_teste->criaAgendaMes($mes_novembro);

$dentista_teste_funcionario = new DentistaFuncionario('123123123', 'Michael Jordan', '(31)991919191', 'jordan@dentalsolutions.com', '78945612301',$endereco1, $agenda1_teste ,5000.00, []);
$habilitacao1_teste_dentistaFuncionario = new Habilitacao($especialidade_teste_clinicoGeral);
$habilitacao2_teste_dentistaFuncionario = new Habilitacao($especialidade_teste_endodontia);
$habilitacao3_teste_dentistaFuncionario = new Habilitacao($especialidade_teste_cirurgia);
$dentista_teste_funcionario->addHabilitacao($habilitacao1_teste_dentistaFuncionario);
$dentista_teste_funcionario->addHabilitacao($habilitacao2_teste_dentistaFuncionario);
$dentista_teste_funcionario->addHabilitacao($habilitacao3_teste_dentistaFuncionario);

$agenda2_teste = new Agenda('8:00-12:00','14:00-17:30','14:00-17:30','14:00-17:30','8:00-12:00'); // IMPLEMENTAR
$agenda1_teste->criaAgendaMes($mes_novembro);

$dentista_teste_parceiro = new DentistaParceiro('321321321', 'Shaquile Oneal', '(31)990909090', 'shaq@dentalsolutions.com', '32165498778', $endereco15, [], $agenda2_teste);
$habilitacao1_teste_dentistaParceiro = new Habilitacao($especialidade_teste_clinicoGeral, 0.4);
$habilitacao2_teste_dentistaParceiro = new Habilitacao($especialidade_teste_estetica, 0.4);
$dentista_teste_parceiro->addHabilitacao($habilitacao1_teste_dentistaParceiro);
$dentista_teste_parceiro->addHabilitacao($habilitacao2_teste_dentistaParceiro);


/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/

//TESTE 6
$cliente_teste = new Cliente('Lebron James', '(31)999999999', 'king@dentalsolutions.com', '121.198.873-98', '78540258');
$paciente_teste = new Paciente('Wilt Chamberlain', '(31)987654562', 'wilt@dentalsolutions.com', '444.333.222-11', '12/12/1999', $cliente_teste, '35759515');

//agendamento consulta avaliacao padrao
$procedimentoAvaliacaoPadrao_teste = new Procedimento('Avaliacao', 'Avaliacao padrao pre consultas', '0', $especialidade_teste_clinicoGeral);

//verificacao ja feita no momento do agendamento pelo controller da Consulta
if(($dentista_teste_parceiro->getAgenda())->disponibilidade(new Datetime("23-11-06"), new DateTime("14:00"), 30 ) == false){
    $consulta_avaliacao_teste = new Consulta($procedimentoAvaliacaoPadrao_teste, $paciente_teste, $dentista_teste_parceiro, new DateTime("23-11-06"), new DateTime("14:00"), 30);
}
else{
    $consulta_avaliacao_teste = new Consulta($procedimentoAvaliacaoPadrao_teste, $paciente_teste, $dentista_teste_funcionario, new DateTime("23-11-06"), new DateTime("14:00"), 30);    
}

$procedimento_teste_restauracao2 = new Procedimento('Restauracao', '', 185, $especialidade_teste_clinicoGeral);
$pagamento_teste = new Pagamento($formaPagamento_teste_credito_4x, False, new Datetime("2023-11-06"), 2070);
$orcamento_teste = new Orcamento($paciente_teste, $dentista_teste_parceiro, new Datetime("2023-11-06"), [$procedimento_teste_limpeza, $procedimento_teste_clareamentoLaser, $procedimento_teste_restauracao, $procedimento_teste_restauracao2], $pagamento_teste, 'Orcamento de duas restauracoes e um clareamento', []);
$orcamento_teste->calculaValorTotal();

//Esta verificação é feita no ConsultaController ao tentar criar uma nova consulta
$orcamento_Teste->aprovaTratamento();
if($orcamento_teste->getTratamentoAprovado() == True){

//Caso o dentista não tenha a especialidade para realizar a consulta, a criacao da consulta será negada.
$consulta1_teste = new Consulta($procedimento_teste_restauracao, $paciente_teste, $dentista_teste_funcionario, new DateTime("2023-11-07"), new DateTime("16"), 30);
$consulta2_teste = new Consulta($procedimento_teste_restauracao2, $paciente_teste, $dentista_teste_funcionario, new DateTime("2023-11-08"), new DateTime("16"), 30);
$consulta2_teste = new Consulta($procedimento_teste_clareamentoLaser, $paciente_teste, $dentista_teste_parceiro, new DateTime("2023-11-08"), new DateTime("16"), 30);

$financeiro_teste = new Financeiro();
$financeiro_teste->calculaResultadoMensal($mes_novembro);
}
