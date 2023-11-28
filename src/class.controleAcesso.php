<?php

require_once("global.php");

//----------------------------------VARIAVEIS PARA TESTE------------------------------------------------------------------------------
$funcionalidade1 = new Funcionalidade("Cadastrar Orcamento");
$Dentista_teste = new Perfil("Dentista", []);

$funcionalidade2 = new Funcionalidade("Cadastrar Usuario");
$Secretario_teste = new Perfil("Secretario", []);

$Dentista_teste->addFuncionalidade($funcionalidade1);
$Secretario_teste->addFuncionalidade($funcionalidade2);

$UsuarioDentista = new Usuario('dentistateste','123','123@gmail.com', $Dentista_teste);
$UsuarioSecretario = new Usuario('secretarioteste', '123', '321@gmail.com', $Secretario_teste);
//-------------------------------------------------------------------------------------------------------------------------------------------------



//----------------------------------FUNCOES DE EXECUCAO DA FUNCIONALIDADE---------------------------------------------------------
function cadastraUsuario($nomeUsuario, $nomelogin, $senha, $email, $perfildele){
        echo("Cadastrando Usuario...\n");
        $$nomeUsuario = new Usuario($nomelogin,$senha,$email,$perfildele);
        echo("Usuario Cadastrado com sucesso!\n");
        var_dump($$nomeUsuario);
}

function cadastraOrcamento(string $nome_orcamento, string $id, Paciente $paciente, Dentista $dentistaResponsavel, DateTime $dataOrcamento, array $procedimentos, float $valorTotal, Pagamento $pagamento, string $descricao, array $consultas){
        $$nome_orcamento = new Orcamento($id,$paciente,$dentistaResponsavel,$dataOrcamento,$procedimentos,$valorTotal,$pagamento,$descricao,$consultas);       
}

function excluiOrcamento(Orcamento $orcamento) {
        $orcamento->__destruct();
}

function alteraOrcamento(Orcamento $orcamento,string $id, Paciente $paciente, Dentista $dentistaResponsavel, DateTime $dataOrcamento, array $procedimentos, float $valorTotal, Pagamento $pagamento, string $descricao, array $consultas){
       echo "faltam todos os sets necessarios"; //criar sets necessarios
}

//------------------------------------------------------------------------------------------------------------------------------------------



//----------------------------------FUNCOES DE VERIFICACAO DA PERMISSAO---------------------------------------------------------------------------

function verificaPermissao(Perfil $perfil, Funcionalidade $funcionalidade){
        if(!in_Array($funcionalidade, $perfil->getFuncionalidades())){
                throw new Exception("Unauthorized");
        }
    return in_Array($funcionalidade, $perfil->getFuncionalidades()); 
}


function permissionCall(Usuario $logado, Funcionalidade $funcionalidade){ //so chamar o getUsuarioLogado() da classe login pra saber quem e o usuario que esta solicitando
       
       try{
        verificaPermissao($logado->getPerfil(),$funcionalidade);
        echo "Permissão concedida\n";
        
        switch($funcionalidade->getNome()){
            case "Cadastrar Orcamento":
                //cadastraOrcamento($nomeOrcamento,$id,$paciente,$dentistaresposavel,$dataorcamento,)
                break;
            case "Excluir Orcamento":
                echo("Qual orcamento voce deseja excluir?\n");
                $orcamento_excluido = rtrim(fgets(STDIN));
                //excluiOrcamento($orcamento_Excluido); // como passar um orcamento existente para ca?;
                break;
            case "Alterar Orcamento":
                //
                break;
                

            case "Cadastrar Usuario":
                echo("\nVoce está cadastrando um Usuario\n");
                echo("Digite um nome para o usuario\n");
                $nomeUsuario = rtrim(fgets(STDIN));
                echo("Digite um nome para o login\n");
                $nomelogin = rtrim(fgets(STDIN));
                echo("Digite uma senha\n");
                $senha =  rtrim(fgets(STDIN));
                echo("Digite um email\n");
                $email = rtrim(fgets(STDIN));
                echo("Digite um nome para o Perfil que ele pertence\n");
                $nomeperfil = rtrim(fgets(STDIN));
                //como fazer a pessoa digitar um usuario padrao e ele receber este usuario sem criar um novo??
                $perfildele = new Perfil ($nomeperfil, []); 
                cadastraUsuario($nomeUsuario, $nomelogin,$senha,$email,$perfildele);
                break;
            case "Excluir Usuario":
                    //funcao
                    break;
            case "Alterar Usuario":
                    //funcao
                    break;


            case "Cadastrar Procedimento":
                    //funcao
                    break;
            case "Excluir Procedimento":
                    //funcao
                    break;
            case "Alterar Procedimento":
                    //funcao
                    break;


            case "Cadastrar Consulta":
                    //funcao
                    break;
            case "Excluir Consulta":
                    //funcao
                    break;
            case "Alterar Consulta":
                    //funcao
                    break;


            case "Cadastrar Cliente":
                    //funcao
                    break;
            case "Excluir Cliente":
                    //funcao
                    break;
            case "Alterar Cliente":
                    //funcao
                    break;


            case "Entrar no sistema":
                        //funcao
                        break;
            case "Sair do sistema":
                        //funcao
                        break;


            case "Cadastrar profissional":
                        //funcao
                        break;
        }
    }

    catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
      }
    
}

//----------------------------------TESTANDO SE A PERMISSAO FUNCIONOU --------------------------------------------------------------------

echo("testando usuario dentista\n");
permissionCall($UsuarioDentista, $funcionalidade2);
echo("\ntestando usuario secretario\n");
permissionCall($UsuarioSecretario, $funcionalidade2);

//--------------------------------------------------------------------------------------------------------------------------------------------------

?>