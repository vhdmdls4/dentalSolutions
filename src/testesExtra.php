<?php

require_once 'class.controleAcesso.php';
require_once 'class.Funcionalidade.php';
require_once('global.php');
// Criação das classes

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// CADA VEZ QUE RODAR ESSE ARQUIVO, COMENTAR AS LINHAS COM save() PARA NAO DAR ERRO DE DUPLICIDADE
// CASO QUEIRA FAZER MUDANCAS APAGUE OS ARQUIVOS DO BANCO DE DADOS E RODE O ARQUIVO NOVAMENTE

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*---------------------------------------------------------FUNCIONALIDADE---------------------------------------------------------*/

//criacao de funcionalidades padrao
$cadastrar_orcamento = new Funcionalidade("Cadastrar orcamento");

$excluir_orcamento = new Funcionalidade("Excluir orcamento");
$alterar_orcamento = new Funcionalidade("Alterar orcamento");

$cadastrar_usuario = new Funcionalidade("Cadastrar usuario");
$excluir_usuario = new Funcionalidade("Excluir usuario");
$alterar_usuario = new Funcionalidade("Alterar usuario");

$cadastrar_procedimento = new Funcionalidade("Cadastrar procedimento");
$excluir_procedimento = new Funcionalidade("Excluir procedimento");
$alterar_procedimento = new Funcionalidade("Alterar procedimento");

$cadastrar_consulta = new Funcionalidade("Cadastrar consulta");
$excluir_consulta = new Funcionalidade("Excluir consulta");
$alterar_consulta = new Funcionalidade("Alterar consulta");

$cadastrar_cliente = new Funcionalidade("Cadastrar cliente");
$excluir_cliente = new Funcionalidade("Cadastrar cliente");
$alterar_cliente = new Funcionalidade("Alterar cliente");

$entrar = new Funcionalidade("Entrar no sistema"); //se o login do usuario estiver no sistema, fazer login com a classe Login
$sair = new Funcionalidade("Sair do sistema"); //usar funcao deslogar de Login

/*------------------------------------------------------------ENDERECOS-----------------------------------------------------------*/

$endereco1 = new Endereco("Rua Antonio Carlos", "Sao Luiz", "12312123", "Apto 1001", 123, "BH", "MG");
$endereco1->save();

$endereco2 = new Endereco("Rua Pedro II", "Centro", "45645645", "Apto 202", 456, "RJ", "RJ");
$endereco2->save();

$endereco3 = new Endereco("Avenida Paulista", "Bela Vista", "01311300", "Conjunto 101", 789, "SP", "SP");
$endereco3->save();

$endereco4 = new Endereco("Rua Visconde de Pirajá", "Ipanema", "22410002", "Casa", 321, "RJ", "RJ");
$endereco4->save();

$endereco5 = new Endereco("Rua das Flores", "Jardim Botânico", "34534534", "Casa", 567, "Curitiba", "PR");
$endereco5->save();

$endereco6 = new Endereco("Avenida Beira Mar", "Centro", "67867867", "Apto 303", 890, "Fortaleza", "CE");
$endereco6->save();

$endereco7 = new Endereco("Rua da Praia", "Boa Viagem", "78978978", "Conjunto 404", 123, "Recife", "PE");
$endereco7->save();

$endereco8 = new Endereco("Avenida Atlântica", "Copacabana", "89089089", "Apto 505", 456, "RJ", "RJ");
$endereco8->save();

$endereco9 = new Endereco("Rua das Palmeiras", "Jardim Tropical", "90190190", "Casa", 789, "Manaus", "AM");
$endereco9->save();

$endereco10 = new Endereco("Avenida do Sol", "Centro", "10210210", "Apto 606", 234, "Natal", "RN");
$endereco10->save();

$endereco11 = new Endereco("Rua da Lua", "Boa Vista", "20320320", "Conjunto 707", 567, "Porto Alegre", "RS");
$endereco11->save();

$endereco12 = new Endereco("Avenida das Estrelas", "Copacabana", "30430430", "Apto 808", 890, "RJ", "RJ");
$endereco12->save();

$endereco13 = new Endereco("Rua dos Coqueiros", "Praia do Futuro", "40540540", "Casa", 901, "Fortaleza", "CE");
$endereco13->save();

$endereco14 = new Endereco("Avenida do Farol", "Ponta Negra", "50650650", "Apto 909", 345, "Natal", "RN");
$endereco14->save();

$endereco15 = new Endereco("Rua do Sol", "Praia da Costa", "60760760", "Conjunto 1010", 678, "Vila Velha", "ES");
$endereco15->save();

$endereco16 = new Endereco("Avenida da Lua", "Praia do Canto", "70870870", "Apto 1111", 123, "Vitória", "ES");
$endereco16->save();

/*------------------------------------------------------------AUXILIARES----------------------------------------------------------*/

$auxiliar1 = new Auxiliar(1900.00, "João Silva", "aux1@dentalsolutions.com.br", "12312312312", "758.642.900-68", $endereco1);
$auxiliar1->save();

$auxiliar2 = new Auxiliar(2100.00, "Maria Santos", "aux2@dentalsolutions.com.br", "23423423423", "116.624.520-98", $endereco2);
$auxiliar2->save();

$auxiliar3 = new Auxiliar(2300.00, "Paulo Costa", "aux3@dentalsolutions.com.br", "34534534534", "778.437.390-25", $endereco3);
$auxiliar3->save();

$auxiliar4 = new Auxiliar(2000.00, "Ana Pereira", "aux4@dentalsolutions.com.br", "45645645645", "582.337.810-61", $endereco4);
$auxiliar4->save();

/*-----------------------------------------------------------SECRETARIOS----------------------------------------------------------*/

$secretario1 = new Secretario(1500.00, "Lucas Souza", "sec1@dentalsolutions.com.br", "56756756756", "127.048.120-71", $endereco5);
$secretario1->save();

$secretario2 = new Secretario(1600.00, "Camila Santos", "sec2@dentalsolutions.com.br", "67867867867", "398.028.840-49", $endereco6);
$secretario2->save();

$secretario3 = new Secretario(1700.00, "Ricardo Costa", "sec3@dentalsolutions.com.br", "78978978978", "105.307.860-95", $endereco7);
$secretario3->save();

$secretario4 = new Secretario(1650.00, "Patricia Pereira", "sec4@dentalsolutions.com.br", "89089089089", "077.898.200-95", $endereco8);
$secretario4->save();

/*-------------------------------------------------------------AGENDAS-------------------------------------------------------------*/

$agenda1 = new Agenda("9:00-12:00", "13:00-18:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00");

$agenda2 = new Agenda("9:00-12:00", "13:00-18:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00");

$agenda3 = new Agenda("9:00-12:00", "13:00-18:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00");

$agenda4 = new Agenda("9:00-12:00", "13:00-18:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00");

$agenda5 = new Agenda("9:00-12:00", "13:00-18:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00");

$agenda6 = new Agenda("9:00-12:00", "13:00-18:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00");

$agenda7 = new Agenda("9:00-12:00", "13:00-18:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00");

$agenda8 = new Agenda("9:00-12:00", "13:00-18:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 13:30-17:00", "9:00-12:00, 14:00-17:00");

/*------------------------------------------------------DENTISTAS-FUNCIONARIOS-----------------------------------------------------*/

$dentistaFuncionario1 = new DentistaFuncionario("CRO-1234", "Pedro Alves", "31900000000", "dentista1@dentalsolutions.com.br", "058.319.530-09", $endereco9, $agenda1, 5000.00, []);
$dentistaFuncionario1->save();

$dentistaFuncionario2 = new DentistaFuncionario("CRO-2345", "Laura Menezes", "31911111111", "dentista2@dentalsolutions.com.br", "058.806.460-25", $endereco10, $agenda2, 5500.00, []);
$dentistaFuncionario2->save();

$dentistaFuncionario3 = new DentistaFuncionario("CRO-3456", "Gabriel Souza", "31922222222", "dentista3@dentalsolutions.com.br", "129.996.390-07", $endereco11, $agenda3, 6000.00, []);
$dentistaFuncionario3->save();

$dentistaFuncionario4 = new DentistaFuncionario("CRO-4567", "Beatriz Santos", "31933333333", "dentista4@dentalsolutions.com.br", "686.459.700-82", $endereco12, $agenda4, 6500.00, []);
$dentistaFuncionario4->save();

/*-------------------------------------------------------DENTISTAS-PARCEIROS-------------------------------------------------------*/

$dentistaParceiro1 = new DentistaParceiro("CRO-5678", "Roberto Silva", "31944444444", "dentistap1@dentalsolutions.com.br", "202.219.470-51", $endereco13, [], $agenda5);
$dentistaParceiro1->save();

$dentistaParceiro2 = new DentistaParceiro("CRO-6789", "Juliana Santos", "31955555555", "dentistap2@dentalsolutions.com.br", "690.074.070-74", $endereco14, [], $agenda6);
$dentistaParceiro2->save();

$dentistaParceiro3 = new DentistaParceiro("CRO-7890", "Carlos Costa", "31966666666", "dentistap3@dentalsolutions.com.br", "824.550.610-94", $endereco15, [], $agenda7);
$dentistaParceiro3->save();

$dentistaParceiro4 = new DentistaParceiro("CRO-8901", "Fernanda Pereira", "31977777777", "dentistap4@dentalsolutions.com.br", "230.175.640-88", $endereco16, [], $agenda8 );
$dentistaParceiro4->save();

/*-------------------------------------------------------------CLIENTES-----------------------------------------------------------*/

$cliente1 = new Cliente("Carlos Souza", "31900000000", "cliente1@dentalsolutions.com", "129.421.650-10", "MG-15.345.678");
//$cliente1->save();

$cliente2 = new Cliente("Julia Menezes", "31911111111", "cliente2@gmail.com", "799.421.650-10", "MG-23.456.789");
//$cliente2->save();

$cliente3 = new Cliente("Roberto Alves", "31922222222", "cliente3@gmail.com", "511.501.450-56", "MG-34.567.890");
//$cliente3->save();

$cliente4 = new Cliente("Fernanda Lima", "31933333333", "cliente4@gmail.com", "618.962.130-90", "MG-45.678.901");
//$cliente4->save();

/*------------------------------------------------------------PACIENTES-----------------------------------------------------------*/

$paciente1 = new Paciente("Lucas Oliveira", "31944444444", "lucasOliveira@gmail.com", "492.609.100-30", "2007-01-01", $cliente1, "MG-12.345.678");
//$paciente1->save();
$cliente1->adicionaPaciente($paciente1);
//$cliente1->save();

$paciente2 = new Paciente("Julia Menezes", "31911111111", "cliente2@gmail.com", "259.156.820-06", "1990-03-03", $cliente2, "MG-23.456.789");
//$paciente2->save();
$cliente2->adicionaPaciente($paciente2);
//$cliente2->save();

$paciente3 = new Paciente("Roberto Alves", "31922222222", "cliente3@gmail.com", "002.734.410-00", "1985-02-02", $cliente3, "MG-34.567.890");
//$paciente3->save();
$cliente3->adicionaPaciente($paciente3);
//$cliente3->save();

$paciente4 = new Paciente("Daniela Costa", "31977777777", "danielaCosta@gmail.com", "168.337.590-49", "2010-04-04", $cliente4, "MG-45.678.901");
//$paciente4->save();
$cliente4->adicionaPaciente($paciente4);
//$cliente4->save();


/*--------------------------------------------------------------PERFIL------------------------------------------------------------*/

$perfil1 = new Perfil("Dentista", [$cadastrar_procedimento, $alterar_procedimento, $excluir_procedimento, $cadastrar_consulta, $alterar_consulta, $excluir_consulta]);
//$perfil1->save();

$perfil2 = new Perfil("Secretario", [$cadastrar_cliente, $alterar_cliente, $excluir_cliente, $cadastrar_usuario, $alterar_usuario, $excluir_usuario]);
//$perfil2->save();

$perfil3 = new Perfil("Auxiliar", [$cadastrar_orcamento, $alterar_orcamento, $excluir_orcamento]);
//$perfil3->save();

$perfil4 = new Perfil("Administrador", [$cadastrar_procedimento, $alterar_procedimento, $excluir_procedimento, $cadastrar_consulta, $alterar_consulta, $excluir_consulta, $cadastrar_cliente, $alterar_cliente, $excluir_cliente, $cadastrar_usuario, $alterar_usuario, $excluir_usuario, $cadastrar_orcamento, $alterar_orcamento, $excluir_orcamento]);
//$perfil4->save();

/*-------------------------------------------------------------USUARIOS-----------------------------------------------------------*/

$usuario1 = new Usuario("Eduardo", "123", "eduardo@dentalsoutions.com", $perfil1);
//$usuario1->save();

$usuario2 = new Usuario("Pedro", "456", "pedro@dentalsoutions.com", $perfil2);
//$usuario2->save();

$usuario3 = new Usuario("Victor", "789", "victor@dentalsoutions.com", $perfil3);
//$usuario3->save();

$usuario4 = new Usuario("Henrique", "321", "henrique@dentalsoutions.com", $perfil4);
//$usuario4->save();

/*----------------------------------------------------------ESPECIALIDADES--------------------------------------------------------*/

$especialidade1 = new Especialidade("Ortodontia");
//$especialidade1->save();

$especialidade2 = new Especialidade("Odontopediatria");
//$especialidade2->save();

$especialidade3 = new Especialidade("Periodontia");
//$especialidade3->save();

$especialidade4 = new Especialidade("Implantodontia");
//$especialidade4->save();

/*----------------------------------------------------------PROCEDIMENTOS---------------------------------------------------------*/

$procedimento1 = new Procedimento("Limpeza Dental", "Limpeza profunda dos dentes", 100.00, $especialidade1);
//$procedimento1->save();

$procedimento2 = new Procedimento("Extração de Dente", "Remoção de dente", 200.00, $especialidade2);
//$procedimento2->save();

$procedimento3 = new Procedimento("Clareamento Dental", "Procedimento para clarear os dentes", 300.00, $especialidade3);
//$procedimento3->save();

$procedimento4 = new Procedimento("Implante Dentário", "Procedimento para implantar dentes", 400.00, $especialidade4);
//$procedimento4->save();

/*-----------------------------------------------------------HABILITACOES---------------------------------------------------------*/

$habilitacao1 = new Habilitacao($especialidade1, 0.40);
$dentistaParceiro1->addHabilitacao($habilitacao1);
//$dentistaParceiro1->save();

$habilitacao2 = new Habilitacao($especialidade2, 0.70);
$dentistaParceiro1->addHabilitacao($habilitacao2);
//$dentistaParceiro1->save();

$habilitacao3 = new Habilitacao($especialidade3, 0.75);
$dentistaParceiro2->addHabilitacao($habilitacao3);
//$dentistaParceiro2->save();

$habilitacao4 = new Habilitacao($especialidade4, 0.55);
$dentistaParceiro2->addHabilitacao($habilitacao4);
//$dentistaParceiro2->save();

$habilitacao5 = new Habilitacao($especialidade3, 0.65);
$dentistaParceiro3->addHabilitacao($habilitacao5);
//$dentistaParceiro3->save();

$habilitacao6 = new Habilitacao($especialidade4, 0.70);
$dentistaParceiro4->addHabilitacao($habilitacao6);
//$dentistaParceiro4->save();

$habilitacao7 = new Habilitacao($especialidade1, 0.50);
$dentistaParceiro4->addHabilitacao($habilitacao7);
//$dentistaParceiro4->save();

$habilitacao8 = new Habilitacao($especialidade2, 0.80);
$dentistaParceiro4->addHabilitacao($habilitacao8);
//$dentistaParceiro4->save();

$habilitacao9 = new Habilitacao($especialidade1);
$dentistaFuncionario1->addHabilitacao($habilitacao9);
//$dentistaFuncionario1->save();

$habilitacao10 = new Habilitacao($especialidade2);
$dentistaFuncionario2->addHabilitacao($habilitacao10);
//$dentistaFuncionario2->save();

$habilitacao11 = new Habilitacao($especialidade3);
$dentistaFuncionario3->addHabilitacao($habilitacao11);
//$dentistaFuncionario3->save();

$habilitacao12 = new Habilitacao($especialidade4);
$dentistaFuncionario4->addHabilitacao($habilitacao12);
//$dentistaFuncionario4->save();

/*------------------------------------------------------------CONSULTAS-----------------------------------------------------------*/

$consulta1 = new Consulta($procedimento1, $paciente1, $dentistaParceiro1, new DateTime("2023-11-18"), new DateTime("10:00"), 35);
//$consulta1->save();
$dentistaParceiro1->addRenda($consulta1->getProcedimento(), $consulta1->getData());
//$dentistaParceiro1->save();

$consulta2 = new Consulta($procedimento2, $paciente2, $dentistaParceiro1, new DateTime("2023-11-18"), new DateTime("11:00"), 70);
//$consulta2->save();
$dentistaParceiro2->addRenda($consulta2->getProcedimento(), $consulta2->getData());
//$dentistaParceiro2->save();

$consulta3 = new Consulta($procedimento3, $paciente3, $dentistaParceiro2, new DateTime("2023-11-18"), new DateTime("11:00"), 50);
//$consulta3->save();
$dentistaParceiro3->addRenda($consulta3->getProcedimento(), $consulta3->getData());
//$dentistaParceiro3->save();

$consulta4 = new Consulta($procedimento4, $paciente4, $dentistaParceiro4, new DateTime("2023-11-18"), new DateTime("09:00"), 135);
//$consulta4->save();
$dentistaParceiro4->addRenda($consulta4->getProcedimento(), $consulta4->getData());
//$dentistaParceiro4->save();

/*------------------------------------------------------------PAGAMENTOS----------------------------------------------------------*/

$formaPagamento1 = new FormaPagamento(TipoPagamento::Credito, 0.05);
$pagamento1 = new Pagamento($formaPagamento1, false, new DateTime("2023-11-18"), 1000.00);
//$pagamento1->save();

$formaPagamento2 = new FormaPagamento(TipoPagamento::Dinheiro);
$pagamento2 = new Pagamento($formaPagamento2, true, new DateTime("2023-11-19"), 1500.00);
//$pagamento2->save();

$formaPagamento3 = new FormaPagamento(TipoPagamento::Debito, 0.10);
$pagamento3 = new Pagamento($formaPagamento3, false, new DateTime("2023-11-20"), 2000.00);
//$pagamento3->save();

$formaPagamento4 = new FormaPagamento(TipoPagamento::Pix);
$pagamento4 = new Pagamento($formaPagamento4, true, new DateTime("2023-11-21"), 2500.00);
//$pagamento4->save();


/*------------------------------------------------------------ORCAMENTOS----------------------------------------------------------*/

$orcamento1 = new Orcamento($paciente1, $dentistaParceiro1, new DateTime("2023-11-18"), [$procedimento1], $pagamento1, "Orçamento para limpeza dental", [$consulta1]);
//$orcamento1->save();

$orcamento2 = new Orcamento($paciente2, $dentistaParceiro1, new DateTime("2023-11-19"), [$procedimento2], $pagamento2, "Orçamento para extração de dente", [$consulta2]);
//$orcamento2->save();

$orcamento3 = new Orcamento($paciente3, $dentistaParceiro2, new DateTime("2023-11-20"), [$procedimento3], $pagamento3, "Orçamento para clareamento dental", [$consulta3]);
//$orcamento3->save();

$orcamento4 = new Orcamento($paciente4, $dentistaParceiro4, new DateTime("2023-11-21"), [$procedimento4], $pagamento4, "Orçamento para implante dentário", [$consulta4]);
//$orcamento4->save();


/*---------------------------------------------------ROTERIO DE TESTES------------------------------------------------------------*/
//TESTE1
//tentar fazer algo sem estar logado

/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/

//TESTE2
$perfil_teste = new Perfil('Teste', [$alterar_procedimento, $cadastrar_consulta, $alterar_consulta, $cadastrar_cliente, $alterar_cliente, $cadastrar_usuario, $alterar_usuario, $cadastrar_orcamento, $alterar_orcamento, $cadastrar_paciente, $alterar_paciente, $cadastrar_especialidade, $alterar_especialidade, $cadastrar_profissional, $alterar_profissional, $cadastrar_funcionario, $alterar_funcionario, $entrar, $sair]);
$usuario_teste = new Usuario('teste', 'teste123', 'teste@dentalsolutions.com', $perfil_teste);

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
$agenda1_teste = new Agenda('','','','','',''); //IMPLEMENTAR
//Agenda padrao novembro/2023

$dentista_teste_funcionario = new DentistaFuncionario('123123123', 'Michael Jordan', '(31)991919191', 'jordan@dentalsolutions.com', '78945612301',$endereco1, $agenda1_teste ,5000.00, []);
$habilitacao1_teste_dentistaFuncionario = new Habilitacao($especialidade_teste_clinicoGeral);
$habilitacao2_teste_dentistaFuncionario = new Habilitacao($especialidade_teste_endodontia);
$habilitacao3_teste_dentistaFuncionario = new Habilitacao($especialidade_teste_cirurgia);
$dentista_teste_funcionario->addHabilitacao($habilitacao1_teste_dentistaFuncionario);
$dentista_teste_funcionario->addHabilitacao($habilitacao2_teste_dentistaFuncionario);
$dentista_teste_funcionario->addHabilitacao($habilitacao3_teste_dentistaFuncionario);


$agenda2_teste = new Agenda('','','','','',''); // IMPLEMENTAR
//Agenda padrao novembro/2023

$dentista_teste_parceiro = new DentistaParceiro('321321321', 'Shaquile Oneal', '(31)990909090', 'shaq@dentalsolutions.com', '32165498778', $endereco15, [], $agenda2_teste);
$habilitacao1_teste_dentistaParceiro = new Habilitacao($especialidade_teste_clinicoGeral, 0.4);
$habilitacao2_teste_dentistaParceiro = new Habilitacao($especialidade_teste_estetica, 0.4);
$dentista_teste_parceiro->addHabilitacao($habilitacao1_teste_dentistaParceiro);
$dentista_teste_parceiro->addHabilitacao($habilitacao2_teste_dentistaParceiro);
//Agenda padrao novembro/2023

/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/

//TESTE 6
$cliente_teste = new Cliente('Lebron James', '(31)999999999', 'king@dentalsolutions.com', '121.198.873-98', '78540258');
$paciente_teste = new Paciente('Wilt Chamberlain', '(31)987654562', 'wilt@dentalsolutions.com', '444.333.222-11', '12/12/1999', $cliente_teste, '35759515');

/*
agendamento de uma consulta de avaliação com o dentista
parceiro para o dia 06/11 às 14h. Caso não seja possível, 
a consulta deve ser agendada com o dentista funcionário.
*/

$procedimento_teste_restauracao2 = new Procedimento('Restauracao', '', 185, $especialidade_teste_clinicoGeral);
$pagamento_pix_teste = new Pagamento($formaPagamento_teste_pix, False, new Datetime("2023-11-06"), 2070/2);
$pagamento_cartao_teste = new Pagamento($formaPagamento_teste_credito_3x, False, new Datetime("2023-11-06"), 2070/2);
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
$mes_novembro = new DateTime('2023-11');
$financeiro_teste->calculaResultadoMensal($mes_novembro);
}

