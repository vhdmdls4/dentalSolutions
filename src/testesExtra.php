<?php

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

$auxiliar1 = new Auxiliar(1900.00, "João Silva", "aux1@dentalsolutions.com.br", "12312312312", "123.456.789-01", $endereco1);
$auxiliar1->save();

$auxiliar2 = new Auxiliar(2100.00, "Maria Santos", "aux2@dentalsolutions.com.br", "23423423423", "234.567.890-12", $endereco2);
$auxiliar2->save();

$auxiliar3 = new Auxiliar(2300.00, "Paulo Costa", "aux3@dentalsolutions.com.br", "34534534534", "345.678.901-23", $endereco3);
$auxiliar3->save();

$auxiliar4 = new Auxiliar(2000.00, "Ana Pereira", "aux4@dentalsolutions.com.br", "45645645645", "456.789.012-34", $endereco4);
$auxiliar4->save();

/*-----------------------------------------------------------SECRETARIOS----------------------------------------------------------*/

$secretario1 = new Secretario(1500.00, "Lucas Souza", "sec1@dentalsolutions.com.br", "56756756756", "567.890.123-45", $endereco5);
$secretario1->save();

$secretario2 = new Secretario(1600.00, "Camila Santos", "sec2@dentalsolutions.com.br", "67867867867", "678.901.234-56", $endereco6);
$secretario2->save();

$secretario3 = new Secretario(1700.00, "Ricardo Costa", "sec3@dentalsolutions.com.br", "78978978978", "789.012.345-67", $endereco7);
$secretario3->save();

$secretario4 = new Secretario(1650.00, "Patricia Pereira", "sec4@dentalsolutions.com.br", "89089089089", "890.123.456-78", $endereco8);
$secretario4->save();

/*------------------------------------------------------DENTISTAS-FUNCIONARIOS-----------------------------------------------------*/

$dentistaFuncionario1 = new DentistaFuncionario("CRO-1234", "Pedro Alves", "31900000000", "dentista1@dentalsolutions.com.br", "123.456.789-01", $endereco9, 5000.00);
$dentistaFuncionario1->save();

$dentistaFuncionario2 = new DentistaFuncionario("CRO-2345", "Laura Menezes", "31911111111", "dentista2@dentalsolutions.com.br", "234.567.890-12", $endereco10, 5500.00);
$dentistaFuncionario2->save();

$dentistaFuncionario3 = new DentistaFuncionario("CRO-3456", "Gabriel Souza", "31922222222", "dentista3@dentalsolutions.com.br", "345.678.901-23", $endereco11, 6000.00);
$dentistaFuncionario3->save();

$dentistaFuncionario4 = new DentistaFuncionario("CRO-4567", "Beatriz Santos", "31933333333", "dentista4@dentalsolutions.com.br", "456.789.012-34", $endereco12, 6500.00);
$dentistaFuncionario4->save();

/*-------------------------------------------------------DENTISTAS-PARCEIROS-------------------------------------------------------*/

$dentistaParceiro1 = new DentistaParceiro("CRO-5678", "Roberto Silva", "31944444444", "dentistap1@dentalsolutions.com.br", "567.890.123-45", $endereco13);
$dentistaParceiro1->save();

$dentistaParceiro2 = new DentistaParceiro("CRO-6789", "Juliana Santos", "31955555555", "dentistap2@dentalsolutions.com.br", "678.901.234-56", $endereco14);
$dentistaParceiro2->save();

$dentistaParceiro3 = new DentistaParceiro("CRO-7890", "Carlos Costa", "31966666666", "dentistap3@dentalsolutions.com.br", "789.012.345-67", $endereco15);
$dentistaParceiro3->save();

$dentistaParceiro4 = new DentistaParceiro("CRO-8901", "Fernanda Pereira", "31977777777", "dentistap4@dentalsolutions.com.br", "890.123.456-78", $endereco16);
$dentistaParceiro4->save();

/*-------------------------------------------------------------CLIENTES-----------------------------------------------------------*/

$cliente1 = new Cliente("Carlos Souza", "31900000000", "cliente1@gmail.com", "555.666.777-88", "MG-12.345.678");
$cliente1->save();

$cliente2 = new Cliente("Julia Menezes", "31911111111", "cliente2@gmail.com", "666.777.888-99", "MG-23.456.789");
$cliente2->save();

$cliente3 = new Cliente("Roberto Alves", "31922222222", "cliente3@gmail.com", "777.888.999-00", "MG-34.567.890");
$cliente3->save();

$cliente4 = new Cliente("Fernanda Lima", "31933333333", "cliente4@gmail.com", "888.999.000-11", "MG-45.678.901");
$cliente4->save();

/*------------------------------------------------------------PACIENTES-----------------------------------------------------------*/

$paciente1 = new Paciente("Lucas Oliveira", "31944444444", "lucasOliveira@gmail.com", "567.890.123-45", "2007-01-01", $cliente1, "MG-12.345.678");
$paciente1->save();
$cliente1->adicionaPaciente($paciente1);
$cliente1->save();

$paciente2 = new Paciente("Julia Menezes", "31911111111", "cliente2@gmail.com", "666.777.888-99", "1990-03-03", $cliente2, "MG-23.456.789");
$paciente2->save();
$cliente2->adicionaPaciente($paciente2);
$cliente2->save();

$paciente3 = new Paciente("Roberto Alves", "31922222222", "cliente3@gmail.com", "777.888.999-00", "1985-02-02", $cliente3, "MG-34.567.890");
$paciente3->save();
$cliente3->adicionaPaciente($paciente3);
$cliente3->save();

$paciente4 = new Paciente("Daniela Costa", "31977777777", "danielaCosta@gmail.com", "890.123.456-78", "2010-04-04", $cliente4, "MG-45.678.901");
$paciente4->save();
$cliente4->adicionaPaciente($paciente4);
$cliente4->save();


/*--------------------------------------------------------------PERFIL------------------------------------------------------------*/

$perfil1 = new Perfil("Dentista", [$cadastrar_procedimento, $alterar_procedimento, $excluir_procedimento, $cadastrar_consulta, $alterar_consulta, $excluir_consulta]);
$perfil1->save();

$perfil2 = new Perfil("Secretario", [$cadastrar_cliente, $alterar_cliente, $excluir_cliente, $cadastrar_usuario, $alterar_usuario, $excluir_usuario]);
$perfil2->save();

$perfil3 = new Perfil("Auxiliar", [$cadastrar_orcamento, $alterar_orcamento, $excluir_orcamento]);
$perfil3->save();

$perfil4 = new Perfil("Administrador", [$cadastrar_procedimento, $alterar_procedimento, $excluir_procedimento, $cadastrar_consulta, $alterar_consulta, $excluir_consulta, $cadastrar_cliente, $alterar_cliente, $excluir_cliente, $cadastrar_usuario, $alterar_usuario, $excluir_usuario, $cadastrar_orcamento, $alterar_orcamento, $excluir_orcamento]);
$perfil4->save();

/*-------------------------------------------------------------USUARIOS-----------------------------------------------------------*/

$usuario1 = new Usuario("Eduardo", "123", "eduardo@dentalsoutions.com", $perfil1);
$usuario1->save();

$usuario2 = new Usuario("Pedro", "456", "pedro@dentalsoutions.com", $perfil2);
$usuario2->save();

$usuario3 = new Usuario("Victor", "789", "victor@dentalsoutions.com", $perfil3);
$usuario3->save();

$usuario4 = new Usuario("Henrique", "321", "henrique@dentalsoutions.com", $perfil4);
$usuario4->save();

/*----------------------------------------------------------ESPECIALIDADES--------------------------------------------------------*/

$especialidade1 = new Especialidade("Ortodontia");
$especialidade1->save();

$especialidade2 = new Especialidade("Odontopediatria");
$especialidade2->save();

$especialidade3 = new Especialidade("Periodontia");
$especialidade3->save();

$especialidade4 = new Especialidade("Implantodontia");
$especialidade4->save();

/*----------------------------------------------------------PROCEDIMENTOS---------------------------------------------------------*/

$procedimento1 = new Procedimento("Limpeza Dental", "Limpeza profunda dos dentes", 100.00, 30, $especialidade1);
$procedimento1->save();

$procedimento2 = new Procedimento("Extração de Dente", "Remoção de dente", 200.00, 60, $especialidade2);
$procedimento2->save();

$procedimento3 = new Procedimento("Clareamento Dental", "Procedimento para clarear os dentes", 300.00, 45, $especialidade3);
$procedimento3->save();

$procedimento4 = new Procedimento("Implante Dentário", "Procedimento para implantar dentes", 400.00, 120, $especialidade4);
$procedimento4->save();

/*-----------------------------------------------------------HABILITACOES---------------------------------------------------------*/

$habilitacao1 = new Habilitacao($especialidade1, 0.40);
$dentistaParceiro1->addHabilitacao($habilitacao1);
$dentistaParceiro1->save();

$habilitacao2 = new Habilitacao($especialidade2, 0.70);
$dentistaParceiro1->addHabilitacao($habilitacao2);
$dentistaParceiro1->save();

$habilitacao3 = new Habilitacao($especialidade3, 0.75);
$dentistaParceiro2->addHabilitacao($habilitacao3);
$dentistaParceiro2->save();

$habilitacao4 = new Habilitacao($especialidade4, 0.55);
$dentistaParceiro2->addHabilitacao($habilitacao4);
$dentistaParceiro2->save();

$habilitacao5 = new Habilitacao($especialidade3, 0.65);
$dentistaParceiro3->addHabilitacao($habilitacao5);
$dentistaParceiro3->save();

$habilitacao6 = new Habilitacao($especialidade4, 0.70);
$dentistaParceiro4->addHabilitacao($habilitacao6);
$dentistaParceiro4->save();

$habilitacao7 = new Habilitacao($especialidade1, 0.50);
$dentistaParceiro4->addHabilitacao($habilitacao7);
$dentistaParceiro4->save();

$habilitacao8 = new Habilitacao($especialidade2, 0.80);
$dentistaParceiro4->addHabilitacao($habilitacao8);
$dentistaParceiro4->save();

$habilitacao9 = new Habilitacao($especialidade1);
$dentistaFuncionario1->addHabilitacao($habilitacao9);
$dentistaFuncionario1->save();

$habilitacao10 = new Habilitacao($especialidade2);
$dentistaFuncionario2->addHabilitacao($habilitacao10);
$dentistaFuncionario2->save();

$habilitacao11 = new Habilitacao($especialidade3);
$dentistaFuncionario3->addHabilitacao($habilitacao11);
$dentistaFuncionario3->save();

$habilitacao12 = new Habilitacao($especialidade4);
$dentistaFuncionario4->addHabilitacao($habilitacao12);
$dentistaFuncionario4->save();

/*------------------------------------------------------------CONSULTAS-----------------------------------------------------------*/

$consulta1 = new Consulta($procedimento1, $paciente1, $dentistaParceiro1, new DateTime("2023-11-18"), new DateTime("10:00"), 35);
$consulta1->save();
$dentistaParceiro1->addRenda($consulta1->getProcedimento(), $consulta1->getData());
$dentistaParceiro1->save();

$consulta2 = new Consulta($procedimento2, $paciente2, $dentistaParceiro1, new DateTime("2023-11-18"), new DateTime("11:00"), 70);
$consulta2->save();
$dentistaParceiro2->addRenda($consulta2->getProcedimento(), $consulta2->getData());
$dentistaParceiro2->save();

$consulta3 = new Consulta($procedimento3, $paciente3, $dentistaParceiro2, new DateTime("2023-11-18"), new DateTime("11:00"), 50);
$consulta3->save();
$dentistaParceiro3->addRenda($consulta3->getProcedimento(), $consulta3->getData());
$dentistaParceiro3->save();

$consulta4 = new Consulta($procedimento4, $paciente4, $dentistaParceiro4, new DateTime("2023-11-18"), new DateTime("09:00"), 135);
$consulta4->save();
$dentistaParceiro4->addRenda($consulta4->getProcedimento(), $consulta4->getData());
$dentistaParceiro4->save();

/*------------------------------------------------------------PAGAMENTOS----------------------------------------------------------*/

$formaPagamento1 = new FormaPagamento(TipoPagamento::Credito, 0.05);
$pagamento1 = new Pagamento($formaPagamento1, false, new DateTime("2023-11-18"), 1000.00);
$pagamento1->save();

$formaPagamento2 = new FormaPagamento(TipoPagamento::Dinheiro);
$pagamento2 = new Pagamento($formaPagamento2, true, new DateTime("2023-11-19"), 1500.00);
$pagamento2->save();

$formaPagamento3 = new FormaPagamento(TipoPagamento::Debito, 0.10);
$pagamento3 = new Pagamento($formaPagamento3, false, new DateTime("2023-11-20"), 2000.00);
$pagamento3->save();

$formaPagamento4 = new FormaPagamento(TipoPagamento::Pix);
$pagamento4 = new Pagamento($formaPagamento4, true, new DateTime("2023-11-21"), 2500.00);
$pagamento4->save();


/*------------------------------------------------------------ORCAMENTOS----------------------------------------------------------*/

$orcamento1 = new Orcamento("1", $paciente1, $dentistaParceiro1, new DateTime("2023-11-18"), [$procedimento1], 1000.00, $pagamento1, "Orçamento para limpeza dental", [$consulta1]);
$orcamento1->save();

$orcamento2 = new Orcamento("2", $paciente2, $dentistaParceiro1, new DateTime("2023-11-19"), [$procedimento2], 1500.00, $pagamento2, "Orçamento para extração de dente", [$consulta2]);
$orcamento2->save();

$orcamento3 = new Orcamento("3", $paciente3, $dentistaParceiro2, new DateTime("2023-11-20"), [$procedimento3], 2000.00, $pagamento3, "Orçamento para clareamento dental", [$consulta3]);
$orcamento3->save();

$orcamento4 = new Orcamento("4", $paciente4, $dentistaParceiro4, new DateTime("2023-11-21"), [$procedimento4], 2500.00, $pagamento4, "Orçamento para implante dentário", [$consulta4]);
$orcamento4->save();
